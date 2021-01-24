<?php

namespace App\Command\Parser;

use App\Entity\CreepyId;
use App\Repository\CreepyImagesRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface as Client;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use Twig\Environment as Twig;

class CreepyImagesCommand extends Command
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var CreepyImagesRepository
     */
    private $repository;

    /**
     * @var Client
     */
    private $client;

    /**
     * CreepyIdGrabCommand constructor.
     *
     * @param EntityManager $entityManager
     * @param CreepyImagesRepository $repository
     * @param Twig $twig
     * @param Client $client
     * @param string|null $name
     */
    public function __construct(
        EntityManager $entityManager,
        CreepyImagesRepository $repository,
        Twig $twig,
        Client $client,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->client = $client;
        $this->twig = $twig;
    }

    protected function configure()
    {
        $this
            ->setName('parser:images:load')
            ->setDescription('Build FB2')
            ->setHelp('Build FB2');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $images = $this->repository->findBy(
            ['hash' => null],
            ['id' => Criteria::ASC]
        );

        foreach ($images as $image) {
            $imageUrl = $image->getUrl();
            $pos = strpos($imageUrl, 'ttp://')||strpos($imageUrl, 'ttps://');
            $url = $pos ? $image->getUrl() : sprintf('https://kriper.net%s', $image->getUrl());
            $hash = md5($image->getUrl());
            $response = $this->client->request(
                'GET',
                $url
            );
            $statusCode = $response->getStatusCode();
            $contentType = $response->getHeaders()['content-type'][0];
            $imageData = $response->getContent();
//            $imageData = file_get_contents($url);
            $base64 = base64_encode($imageData);
            $image->setHash($hash)
                ->setBase64($base64);
            $this->entityManager->flush();
            $output->writeln(sprintf('Image saved: %d', $image->getId()));
        }

        return 0;
    }
}