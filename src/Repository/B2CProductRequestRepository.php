<?php

namespace App\Repository;

use App\Entity\B2CProductRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method B2CProductRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method B2CProductRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method B2CProductRequest[]    findAll()
 * @method B2CProductRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class B2CProductRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, B2CProductRequest::class);
    }

    // /**
    //  * @return B2CProductRequest[] Returns an array of B2CProductRequest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?B2CProductRequest
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
