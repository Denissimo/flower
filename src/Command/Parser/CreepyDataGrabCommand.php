<?php

namespace App\Command\Parser;

use App\Entity\CreepyData;
use App\Entity\CreepyId;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface as Client;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Repository\CreepyIdRepository;
use DateTimeImmutable;

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
     * @var CreepyIdRepository
     */
    private $creepyIdRepository;

    /**
     * CreepyIdGrabCommand constructor.
     *
     * @param EntityManager $entityManager
     * @param CreepyIdRepository $creepyIdRepository
     * @param Client $client
     * @param string|null $name
     */
    public function __construct(
        EntityManager $entityManager,
        CreepyIdRepository $creepyIdRepository,
        Client $client,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->entityManager = $entityManager;
        $this->creepyIdRepository = $creepyIdRepository;
        $this->client = $client;
    }

    protected function configure()
    {
        $this
            ->setName('parser:creepy_data:grab')
            ->setDescription('Grab Kriper data')
            ->setHelp('Grab Kriper dats')
            ->addOption(
                'qty',
                null,
                InputOption::VALUE_OPTIONAL,
                'number of stories loaded per once',
                200
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $this->getApplication()->get('App\Controller');
//        $this->repository->findLast();
        $qty = $input->getOption('qty');
        $creepyIdList = $this->creepyIdRepository->findBy(
            ['parsedAt' => null],
            ['id' => Criteria::DESC],
            (int) $qty
        );

        $num = 0;
        foreach ($creepyIdList as $creepyId) {
            $id = $creepyId->getCreepyId();
            $url = sprintf('https://kriper.net/index.php?newsid=%d', $id);
            $response = $this->client->request(
                'GET',
                $url
            );
            $statusCode = $response->getStatusCode();
//            $output->writeln(sprintf('Status code: %d', $statusCode));
            $contentType = $response->getHeaders()['content-type'][0];
//            $output->writeln(sprintf('Content type: %s', $contentType));
            $content = $response->getContent();
            preg_match_all('/<h1[^>]+>([^<]+)<\/h1>/', $content, $matchesH1);

            preg_match_all(
                '/<div  class="udt"><p itemprop="articleBody">((?!<\/p).+)<\/p><\/div>/s',
                $content,
                $contentPart1
            );
            $part1= $contentPart1[1][0] ?? '';
            $part1 = preg_replace(
                '/<div class="dle_b_test".+/s',
                '',
                $part1
            );
            preg_match_all(
                '/<\/sup><\/center><\/div>((?!<\/p><\/div>).+)<\/p><\/div>/s',
                $content,
                $contentPart2
            );

            $part2= $contentPart2[1][0] ?? '';
            $resultContent = sprintf('<p>%s%s</p>', $part1, $part2);
            $resultContent = preg_replace(
                '/<br \/>|<br>/',
                "</p><p>",
                $resultContent
            );
            $resultContent = preg_replace(
                "/\n|\r|\t|\s{2,}/s",
                '',
                $resultContent
            );
            $resultContent = preg_replace(
                "/<p><\/p>/s",
                '',
                $resultContent
            );

            $creepyData = new CreepyData();
            $title = $matchesH1[1][0] ?? 'No title';
            $title = preg_replace('/^\s{1,}|\s{1,}$/', '', $title);
            $creepyData->setContent($resultContent)
                ->setCreepyId($creepyId)
                ->setTitle($title)
            ;
            $this->entityManager->persist($creepyData);
            $creepyId->setParsedAt(new DateTimeImmutable());

            $num++;
            $output->writeln(sprintf('%d) Parsed story nubmer: %d', $num, $creepyId->getCreepyId()));
            $this->entityManager->flush();
        }


        return 0;
    }
}