<?php

namespace App\Repository;

use App\Entity\LIEUDISPONIBILITE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LIEUDISPONIBILITE>
 *
 * @method LIEUDISPONIBILITE|null find($id, $lockMode = null, $lockVersion = null)
 * @method LIEUDISPONIBILITE|null findOneBy(array $criteria, array $orderBy = null)
 * @method LIEUDISPONIBILITE[]    findAll()
 * @method LIEUDISPONIBILITE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LIEUDISPONIBILITERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LIEUDISPONIBILITE::class);
    }

//    /**
//     * @return LIEUDISPONIBILITE[] Returns an array of LIEUDISPONIBILITE objects
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

//    public function findOneBySomeField($value): ?LIEUDISPONIBILITE
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
