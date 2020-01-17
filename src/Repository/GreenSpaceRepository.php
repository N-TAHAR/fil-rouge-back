<?php

namespace App\Repository;

use App\Entity\GreenSpace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GreenSpace|null find($id, $lockMode = null, $lockVersion = null)
 * @method GreenSpace|null findOneBy(array $criteria, array $orderBy = null)
 * @method GreenSpace[]    findAll()
 * @method GreenSpace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GreenSpaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GreenSpace::class);
    }

    // /**
    //  * @return GreenSpace[] Returns an array of GreenSpace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GreenSpace
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
