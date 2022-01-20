<?php

namespace App\Repository;

use App\Entity\FarmProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FarmProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method FarmProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method FarmProduct[]    findAll()
 * @method FarmProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FarmProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FarmProduct::class);
    }

    // /**
    //  * @return FarmProduct[] Returns an array of FarmProduct objects
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
    public function findOneBySomeField($value): ?FarmProduct
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
