<?php

namespace App\Repository;

use App\Entity\CreepyData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CreepyData|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreepyData|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreepyData[]    findAll()
 * @method CreepyData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreepyDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreepyData::class);
    }

    // /**
    //  * @return CreepyData[] Returns an array of CreepyData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CreepyData
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
