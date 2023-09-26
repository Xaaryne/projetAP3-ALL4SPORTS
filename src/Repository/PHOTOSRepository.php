<?php

namespace App\Repository;

use App\Entity\PHOTOS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PHOTOS>
 *
 * @method PHOTOS|null find($id, $lockMode = null, $lockVersion = null)
 * @method PHOTOS|null findOneBy(array $criteria, array $orderBy = null)
 * @method PHOTOS[]    findAll()
 * @method PHOTOS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PHOTOSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PHOTOS::class);
    }

//    /**
//     * @return PHOTOS[] Returns an array of PHOTOS objects
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

//    public function findOneBySomeField($value): ?PHOTOS
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
