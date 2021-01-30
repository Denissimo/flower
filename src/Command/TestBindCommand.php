<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestBindCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('test:bind')
            ->setDescription('Bind Test.')
            ->setHelp('Bind test command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Bind Test!');

        return 0;
    }

    /**
     * @param string $imagePath
     */
    public function index(string $imagePath) {

        return $imagePath;
    }
}