<?php

namespace App\Repository;

use App\Entity\MayaniProductInventory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MayaniProductInventory|null find($id, $lockMode = null, $lockVersion = null)
 * @method MayaniProductInventory|null findOneBy(array $criteria, array $orderBy = null)
 * @method MayaniProductInventory[]    findAll()
 * @method MayaniProductInventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MayaniProductInventoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MayaniProductInventory::class);
    }

    // /**
    //  * @return MayaniProductInventory[] Returns an array of MayaniProductInventory objects
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
    public function findOneBySomeField($value): ?MayaniProductInventory
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
