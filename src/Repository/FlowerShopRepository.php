<?php

namespace App\Repository;

use App\Entity\FlowerShop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FlowerShop|null find($id, $lockMode = null, $lockVersion = null)
 * @method FlowerShop|null findOneBy(array $criteria, array $orderBy = null)
 * @method FlowerShop[]    findAll()
 * @method FlowerShop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FlowerShopRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FlowerShop::class);
    }

    // /**
    //  * @return FlowerShop[] Returns an array of FlowerShop objects
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
    public function findOneBySomeField($value): ?FlowerShop
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
