<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Dotenv\Dotenv;

class TestDotenvCommand extends Command
{
    /**
     * @var string
     */
    private $imagePath;

    /**
     * TestCommand constructor.
     *
     * @param string|null $name
     */
    public function __construct(string $imagePath, string $name = null)
    {
        parent::__construct($name);

        $this->imagePath = $imagePath;
    }


    protected function configure()
    {
        $this
            ->setName('test:dotenv')
            ->setDescription('Dotenv Test.')
            ->setHelp('Dotenv test command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__.'/../../.env');

        $ip = getenv("REMOTE_ADDR");
        $env = getenv();

        $output->writeln('Whoa Test!');

        return 0;
    }
}