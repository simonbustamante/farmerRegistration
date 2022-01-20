<?php

namespace App\Repository;

use App\Entity\FarmerRegister;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FarmerRegister|null find($id, $lockMode = null, $lockVersion = null)
 * @method FarmerRegister|null findOneBy(array $criteria, array $orderBy = null)
 * @method FarmerRegister[]    findAll()
 * @method FarmerRegister[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FarmerRegisterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FarmerRegister::class);
    }

    // /**
    //  * @return FarmerRegister[] Returns an array of FarmerRegister objects
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
    public function findOneBySomeField($value): ?FarmerRegister
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
