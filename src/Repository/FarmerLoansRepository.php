<?php

namespace App\Repository;

use App\Entity\FarmerLoans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FarmerLoans|null find($id, $lockMode = null, $lockVersion = null)
 * @method FarmerLoans|null findOneBy(array $criteria, array $orderBy = null)
 * @method FarmerLoans[]    findAll()
 * @method FarmerLoans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FarmerLoansRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FarmerLoans::class);
    }

    // /**
    //  * @return FarmerLoans[] Returns an array of FarmerLoans objects
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
    public function findOneBySomeField($value): ?FarmerLoans
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
