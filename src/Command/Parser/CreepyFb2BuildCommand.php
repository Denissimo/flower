<?php

namespace App\Command\Parser;

use App\Command\Parser\ImageData\ImageData;
use App\Entity\CreepyData;
use App\Entity\CreepyImages;
use App\Repository\CreepyDataRepository;
use App\Repository\CreepyImagesRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use Twig\Environment as Twig;

class CreepyFb2BuildCommand extends Command
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var CreepyDataRepository
     */
    private $repository;

    /**
     * @var CreepyImagesRepository
     */
    private $imageRepository;

    /**
     * @var Twig
     */
    private $twig;

    /**
     * CreepyIdGrabCommand constructor.
     *
     * @param EntityManager $entityManager
     * @param CreepyDataRepository $repository
     * @param CreepyImagesRepository $imageRepository
     * @param Twig $twig
     * @param string|null $name
     */
    public function __construct(
        EntityManager $entityManager,
        CreepyDataRepository $repository,
        CreepyImagesRepository $imageRepository,
        Twig $twig,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->imageRepository = $imageRepository;
        $this->twig = $twig;
    }

    protected function configure()
    {
        $this
            ->setName('parser:fb2:build')
            ->setDescription('Build FB2')
            ->setHelp('Build FB2');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $imageData = ImageData::$images;
        for ($part = 1; $part <= 5; $part++) {
            $stories = $this->repository->findBy(
                ['part' => $part],
                ['id' => Criteria::ASC]
            );
//        $stories = $this->repository->findAll();
            $images = $this->imageRepository->loadByUrl();
            $storiesWithImages = $this->replaceImages($stories, $images);
            $render = $this->twig->render(
                'fb2.html.twig',
                [
                    'stories' => $storiesWithImages['stories'],
                    'images' => $storiesWithImages['images'],
                    'image_data' => $imageData,
                    'part' => $part
                ]
            );

//        $storiesWithoutImages = $this->deleteImages($stories);
//        $renderNoImag = $this->twig->render(
//            'fb2_no_imag.twig',
//            [
//                'stories' => $storiesWithoutImages
//            ]
//        );

            file_put_contents(
                'public/creepy_part' . $part . '.fb2',
                $render
            );
        }
//        file_put_contents(
//            'public/creepy_no_imag.fb2',
//            $renderNoImag
//        );

        return 0;
    }

    /**
     * @param CreepyData[] $stories
     * @param CreepyImages[] $images
     *
     * @return []
     */
    private function replaceImages($stories, $images)
    {
        $storyImages = [];
        foreach ($stories as $story) {
            $storyContent = $story->getContent();
            preg_match_all(
                '/<img src="([^"]+)"[^>]+>/s',
                $storyContent,
                $imagesFound
            );

            if (count($imagesFound[0])) {
                foreach ($imagesFound[0] as $key => $val) {
                    $imageUrl = $imagesFound[1][$key];
                    $replacement = sprintf('<image l:href="#%s" />', $images[$imageUrl]->getHash());
                    $storyImages[] = $images[$imageUrl];
                    $storyContent = str_replace($val, $replacement, $storyContent);
                }
                $story->setContent($storyContent);
            }
        }

        return [
            'stories' => $stories,
            'images' => $storyImages
        ];
    }

    /**
     * @param CreepyData[] $stories
     *
     * @return CreepyData[]
     */
    private function deleteImages($stories)
    {
        foreach ($stories as $story) {
            $storyContent = $story->getContent();
            preg_replace(
                '/<img src="([^"]+)"[^>]+>/s',
                '',
                $storyContent
            );
            $story->setContent($storyContent);
        }

        return $stories;
    }
}