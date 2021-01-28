<?php

namespace App\Repository;

use App\Entity\FlowerPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FlowerPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method FlowerPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method FlowerPhoto[]    findAll()
 * @method FlowerPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FlowerPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FlowerPhoto::class);
    }

    // /**
    //  * @return FlowerPhoto[] Returns an array of FlowerPhoto objects
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
    public function findOneBySomeField($value): ?FlowerPhoto
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
