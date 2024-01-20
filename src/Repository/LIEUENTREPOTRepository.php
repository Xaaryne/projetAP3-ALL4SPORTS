<?php

namespace App\Repository;

use App\Entity\LIEUENTREPOT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LIEUENTREPOT>
 *
 * @method LIEUENTREPOT|null find($id, $lockMode = null, $lockVersion = null)
 * @method LIEUENTREPOT|null findOneBy(array $criteria, array $orderBy = null)
 * @method LIEUENTREPOT[]    findAll()
 * @method LIEUENTREPOT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LIEUENTREPOTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LIEUENTREPOT::class);
    }

//    /**
//     * @return LIEUENTREPOT[] Returns an array of LIEUENTREPOT objects
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

//    public function findOneBySomeField($value): ?LIEUENTREPOT
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
