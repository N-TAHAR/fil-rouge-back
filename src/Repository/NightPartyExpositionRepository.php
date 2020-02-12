<?php

namespace App\Repository;

use App\Entity\NightPartyExposition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NightPartyExposition|null find($id, $lockMode = null, $lockVersion = null)
 * @method NightPartyExposition|null findOneBy(array $criteria, array $orderBy = null)
 * @method NightPartyExposition[]    findAll()
 * @method NightPartyExposition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NightPartyExpositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NightPartyExposition::class);
    }

    // /**
    //  * @return NightPartyExposition[] Returns an array of NightPartyExposition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NightPartyExposition
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
