<?php

namespace App\Repository;

use App\Entity\VelibPosition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VelibPosition|null find($id, $lockMode = null, $lockVersion = null)
 * @method VelibPosition|null findOneBy(array $criteria, array $orderBy = null)
 * @method VelibPosition[]    findAll()
 * @method VelibPosition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VelibPositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VelibPosition::class);
    }

    // /**
    //  * @return VelibPosition[] Returns an array of VelibPosition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VelibPosition
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
