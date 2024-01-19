<?php

namespace App\Repository;

use App\Entity\LISTESPORTS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LISTESPORTS>
 *
 * @method LISTESPORTS|null find($id, $lockMode = null, $lockVersion = null)
 * @method LISTESPORTS|null findOneBy(array $criteria, array $orderBy = null)
 * @method LISTESPORTS[]    findAll()
 * @method LISTESPORTS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LISTESPORTSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LISTESPORTS::class);
    }

//    /**
//     * @return LISTESPORTS[] Returns an array of LISTESPORTS objects
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

//    public function findOneBySomeField($value): ?LISTESPORTS
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
