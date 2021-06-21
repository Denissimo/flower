<?php

namespace App\Command\Dadata;

use App\Entity\FlowerBouquet;
use App\Entity\FlowerPhoto;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Velhron\DadataBundle\Service\DadataSuggest;

class TestDadataAddr extends Command
{
    protected static $defaultName = 'dadata:test:addr';

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var DadataSuggest
     */
    private $dadataSuggest;

    /**
     * TestDadataAddr constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param DadataSuggest $dadataSuggest
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        DadataSuggest $dadataSuggest
    )
    {
        parent::__construct(null);

        $this->entityManager = $entityManager;
        $this->dadataSuggest = $dadataSuggest;
    }


    protected function configure()
    {
        $this
            ->setName('dadata:test:addr')
            ->setDescription('Its a Test.')
            ->setHelp('Just a test command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var FlowerBouquet $bouquet */
        $em = $this->entityManager;

        $response = $this->dadataSuggest->suggestAddress('москва холмогор', ['count' => 10]);
        $address = $response[0]->value;

        $response = $this->dadataSuggest->suggestParty('Абрахам', ['count' => 2]);
        $inn = $response[0]->inn;

        $output->writeln('Dadata Test!');

        return 0;
    }
}