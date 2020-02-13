<?php

namespace App\Repository;

use App\Entity\Wifi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Wifi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wifi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wifi[]    findAll()
 * @method Wifi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WifiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wifi::class);
    }

    // /**
    //  * @return Wifi[] Returns an array of Wifi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Wifi
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
