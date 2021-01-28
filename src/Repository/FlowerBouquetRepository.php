<?php

namespace App\Repository;

use App\Entity\FlowerBouquet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FlowerBouquet|null find($id, $lockMode = null, $lockVersion = null)
 * @method FlowerBouquet|null findOneBy(array $criteria, array $orderBy = null)
 * @method FlowerBouquet[]    findAll()
 * @method FlowerBouquet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FlowerBouquetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FlowerBouquet::class);
    }

    // /**
    //  * @return FlowerBouquet[] Returns an array of FlowerBouquet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FlowerBouquet
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
