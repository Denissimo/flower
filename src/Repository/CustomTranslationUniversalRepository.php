<?php

namespace App\Repository;

use App\Entity\CustomTranslationUniversal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Service\CustomLabelTranslatorStrategy as Translation;
use Exception;

/**
 * @method CustomTranslationUniversal|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomTranslationUniversal|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomTranslationUniversal[]    findAll()
 * @method CustomTranslationUniversal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomTranslationUniversalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomTranslationUniversal::class);
    }

    public function findFrom(string $value, string $from = 'en'): ?CustomTranslationUniversal
    {
        if (!in_array($from, CustomTranslationUniversal::$locales)) {
            throw new Exception(sprintf('Locale %s is incorrect!', $from));
        }

        $term = sprintf('c.%s = :val', $from);
        $translation = $this->createQueryBuilder('c')
            ->andWhere($term)
            ->setParameter('val', $value)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
            ;

        return $translation[0] ?? null;
    }

    // /**
    //  * @return CustomTranslationUniversal[] Returns an array of CustomTranslationUniversal objects
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
    public function findOneBySomeField($value): ?CustomTranslationUniversal
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
