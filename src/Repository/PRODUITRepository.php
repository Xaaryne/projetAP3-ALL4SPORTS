<?php

namespace App\Repository;

use App\Entity\PRODUIT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PRODUIT>
 *
 * @method PRODUIT|null find($id, $lockMode = null, $lockVersion = null)
 * @method PRODUIT|null findOneBy(array $criteria, array $orderBy = null)
 * @method PRODUIT[]    findAll()
 * @method PRODUIT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PRODUITRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PRODUIT::class);
    }

//    /**
//     * @return PRODUIT[] Returns an array of PRODUIT objects
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

//    public function findOneBySomeField($value): ?PRODUIT
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
