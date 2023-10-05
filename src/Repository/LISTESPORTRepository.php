<?php

namespace App\Repository;

use App\Entity\LISTESPORT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LISTESPORT>
 *
 * @method LISTESPORT|null find($id, $lockMode = null, $lockVersion = null)
 * @method LISTESPORT|null findOneBy(array $criteria, array $orderBy = null)
 * @method LISTESPORT[]    findAll()
 * @method LISTESPORT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LISTESPORTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LISTESPORT::class);
    }

//    /**
//     * @return LISTESPORT[] Returns an array of LISTESPORT objects
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

//    public function findOneBySomeField($value): ?LISTESPORT
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
