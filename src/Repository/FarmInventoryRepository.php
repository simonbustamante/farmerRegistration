<?php

namespace App\Repository;

use App\Entity\FarmInventory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FarmInventory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FarmInventory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FarmInventory[]    findAll()
 * @method FarmInventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FarmInventoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FarmInventory::class);
    }

    // /**
    //  * @return FarmInventory[] Returns an array of FarmInventory objects
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
    public function findOneBySomeField($value): ?FarmInventory
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
