<?php

namespace App\Repository;

use App\Entity\FlowerCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FlowerCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FlowerCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FlowerCategory[]    findAll()
 * @method FlowerCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FlowerCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FlowerCategory::class);
    }

    // /**
    //  * @return FlowerCategory[] Returns an array of FlowerCategory objects
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
    public function findOneBySomeField($value): ?FlowerCategory
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
