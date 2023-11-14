<?php

namespace App\Repository;

use App\Entity\PHOTOSPRODUIT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PHOTOSPRODUIT>
 *
 * @method PHOTOSPRODUIT|null find($id, $lockMode = null, $lockVersion = null)
 * @method PHOTOSPRODUIT|null findOneBy(array $criteria, array $orderBy = null)
 * @method PHOTOSPRODUIT[]    findAll()
 * @method PHOTOSPRODUIT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PHOTOSPRODUITRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PHOTOSPRODUIT::class);
    }

//    /**
//     * @return PHOTOSPRODUIT[] Returns an array of PHOTOSPRODUIT objects
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

//    public function findOneBySomeField($value): ?PHOTOSPRODUIT
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
