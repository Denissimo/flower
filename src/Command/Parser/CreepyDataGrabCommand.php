<?php

namespace App\Command\Parser;

use App\Entity\CreepyId;
use App\Repository\CreepyIdRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface as Client;
use Doctrine\ORM\EntityManagerInterface as EntityManager;

class CreepyDataGrabCommand extends Command
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var Client
     */
    private $client;

    /**
     * CreepyIdGrabCommand constructor.
     *
     * @param EntityManager $entityManager
     * @param Client $client
     * @param string|null $name
     */
    public function __construct(
        EntityManager $entityManager,
        Client $client,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->entityManager = $entityManager;
        $this->client = $client;
    }

    protected function configure()
    {
        $this
            ->setName('parser:creepy_data:grab')
            ->setDescription('Grab Kriper data')
            ->setHelp('Grab Kriper dats');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $this->getApplication()->get('App\Controller');
//        $this->repository->findLast();
        for ($i=1; $i<=491; $i++) {
            $url = sprintf('https://kriper.net/page/%d/', $i);
            $response = $this->client->request(
                'GET',
                $url
            );
            $statusCode = $response->getStatusCode();
//            $output->writeln(sprintf('Status code: %d', $statusCode));
            $contentType = $response->getHeaders()['content-type'][0];
//            $output->writeln(sprintf('Content type: %s', $contentType));
            $content = $response->getContent();
            preg_match_all('/href="\/index\.php\?newsid=([0-9]+)/', $content, $matches);
            foreach ($matches[1] as $id) {
                $this->entityManager->persist(
                    (new CreepyId())->setCreepyId((int)$id)
                );
            }
            $this->entityManager->flush();
            $output->writeln(sprintf('Id\'s saved: %d', count($matches[1])));
        }
        $this->entityManager->flush();

        return 0;
    }
}