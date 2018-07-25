<?php

namespace App\Repository;

use App\Entity\Callendar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Callendar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Callendar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Callendar[]    findAll()
 * @method Callendar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CallendarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Callendar::class);
    }

//    /**
//     * @return Callendar[] Returns an array of Callendar objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Callendar
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
