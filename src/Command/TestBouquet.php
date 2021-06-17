<?php

namespace App\Command;

use App\Entity\FlowerBouquet;
use App\Entity\FlowerPhoto;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestBouquet extends Command
{
    protected static $defaultName = 'bouquet:test';

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * TestBouquet constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct(null);
        $this->entityManager = $entityManager;
    }


    protected function configure()
    {
        $this
            ->setName('bouquet:test')
            ->setDescription('Its a Test.')
            ->setHelp('Just a test command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var FlowerBouquet $bouquet */
        $bouquet = $this->entityManager->getRepository(FlowerBouquet::class)
            ->find(1);

        /** @var FlowerPhoto[] $photos */
        $photos = $bouquet->getFlowerPhotos()->toArray();

        $photoName = $photos[0]->getName();

        $output->writeln('Whoa Test!');

        return 0;
    }
}