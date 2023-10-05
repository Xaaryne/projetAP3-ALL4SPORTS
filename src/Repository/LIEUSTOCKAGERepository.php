<?php

namespace App\Repository;

use App\Entity\LIEUSTOCKAGE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LIEUSTOCKAGE>
 *
 * @method LIEUSTOCKAGE|null find($id, $lockMode = null, $lockVersion = null)
 * @method LIEUSTOCKAGE|null findOneBy(array $criteria, array $orderBy = null)
 * @method LIEUSTOCKAGE[]    findAll()
 * @method LIEUSTOCKAGE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LIEUSTOCKAGERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LIEUSTOCKAGE::class);
    }

//    /**
//     * @return LIEUSTOCKAGE[] Returns an array of LIEUSTOCKAGE objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LIEUSTOCKAGE
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
