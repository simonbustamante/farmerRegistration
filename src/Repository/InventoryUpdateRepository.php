<?php

namespace App\Repository;

use App\Entity\InventoryUpdate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InventoryUpdate|null find($id, $lockMode = null, $lockVersion = null)
 * @method InventoryUpdate|null findOneBy(array $criteria, array $orderBy = null)
 * @method InventoryUpdate[]    findAll()
 * @method InventoryUpdate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InventoryUpdateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InventoryUpdate::class);
    }

    // /**
    //  * @return InventoryUpdate[] Returns an array of InventoryUpdate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InventoryUpdate
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
