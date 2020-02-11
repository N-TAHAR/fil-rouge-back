<?php

namespace App\Repository;

use App\Entity\DisponibilityVelib;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DisponibilityVelib|null find($id, $lockMode = null, $lockVersion = null)
 * @method DisponibilityVelib|null findOneBy(array $criteria, array $orderBy = null)
 * @method DisponibilityVelib[]    findAll()
 * @method DisponibilityVelib[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisponibilityVelibRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DisponibilityVelib::class);
    }

    // /**
    //  * @return DisponibilityVelib[] Returns an array of DisponibilityVelib objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DisponibilityVelib
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
