<?php

namespace App\Repository;

use App\Entity\MayaniRequestInventory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MayaniRequestInventory|null find($id, $lockMode = null, $lockVersion = null)
 * @method MayaniRequestInventory|null findOneBy(array $criteria, array $orderBy = null)
 * @method MayaniRequestInventory[]    findAll()
 * @method MayaniRequestInventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MayaniRequestInventoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MayaniRequestInventory::class);
    }

    // /**
    //  * @return MayaniRequestInventory[] Returns an array of MayaniRequestInventory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MayaniRequestInventory
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
