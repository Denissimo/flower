<?php

namespace App\Command;

use App\Entity\TestGedmo;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestGedmoCommand extends Command
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * CreepyIdGrabCommand constructor.
     *
     * @param EntityManager $entityManager
     * @param string|null $name
     */
    public function __construct(
        EntityManager $entityManager,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setName('test:gedmo')
            ->setDescription('Test Gedmo.')
            ->setHelp('Test Gedmo command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $testGedmo = new TestGedmo();
        $this->entityManager->persist($testGedmo);
        $this->entityManager->flush();

        $output->writeln('Gedmo Test!');

        return 0;
    }
}