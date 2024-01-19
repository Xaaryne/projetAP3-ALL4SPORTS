<?php

namespace App\Repository;

use App\Entity\PANIER;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PANIER>
 *
 * @method PANIER|null find($id, $lockMode = null, $lockVersion = null)
 * @method PANIER|null findOneBy(array $criteria, array $orderBy = null)
 * @method PANIER[]    findAll()
 * @method PANIER[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PANIERRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PANIER::class);
    }

//    /**
//     * @return PANIER[] Returns an array of PANIER objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PANIER
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
