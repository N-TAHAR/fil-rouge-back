<?php

namespace App\Repository;

use App\Entity\LocationVelib;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LocationVelib|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocationVelib|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocationVelib[]    findAll()
 * @method LocationVelib[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationVelibRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocationVelib::class);
    }

    // /**
    //  * @return LocationVelib[] Returns an array of LocationVelib objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocationVelib
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
