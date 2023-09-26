<?php

namespace App\Repository;

use App\Entity\MAGASIN;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MAGASIN>
 *
 * @method MAGASIN|null find($id, $lockMode = null, $lockVersion = null)
 * @method MAGASIN|null findOneBy(array $criteria, array $orderBy = null)
 * @method MAGASIN[]    findAll()
 * @method MAGASIN[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MAGASINRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MAGASIN::class);
    }

//    /**
//     * @return MAGASIN[] Returns an array of MAGASIN objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MAGASIN
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
