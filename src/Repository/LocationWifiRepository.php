<?php

namespace App\Repository;

use App\Entity\LocationWifi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LocationWifi|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocationWifi|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocationWifi[]    findAll()
 * @method LocationWifi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationWifiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocationWifi::class);
    }

    // /**
    //  * @return LocationWifi[] Returns an array of LocationWifi objects
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
    public function findOneBySomeField($value): ?LocationWifi
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
