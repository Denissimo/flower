<?php

namespace App\Repository;

use App\Entity\TestGedmo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TestGedmo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestGedmo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestGedmo[]    findAll()
 * @method TestGedmo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestGedmoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestGedmo::class);
    }

    // /**
    //  * @return TestGedmo[] Returns an array of TestGedmo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestGedmo
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
