<?php

namespace App\Repository;

use App\Entity\CreepyImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CreepyImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreepyImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreepyImages[]    findAll()
 * @method CreepyImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreepyImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreepyImages::class);
    }

    /**
     * @return CreepyImages[] Returns an array of CreepyImages objects
    */
    public function loadByUrl()
    {
        /** @var CreepyImages[] $images */
        $images = $this->createQueryBuilder('c')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();

        $imageStructure = [];

        foreach ($images as $image) {
            $imageStructure [$image->getUrl()] = $image;
        }

        return $imageStructure;
    }


    /*
    public function findOneBySomeField($value): ?CreepyImages
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
