<?php

namespace App\Repository;

use App\Entity\MayaniLoanProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MayaniLoanProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method MayaniLoanProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method MayaniLoanProducts[]    findAll()
 * @method MayaniLoanProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MayaniLoanProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MayaniLoanProducts::class);
    }

    // /**
    //  * @return MayaniLoanProducts[] Returns an array of MayaniLoanProducts objects
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
    public function findOneBySomeField($value): ?MayaniLoanProducts
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
