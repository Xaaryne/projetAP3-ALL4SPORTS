<?php

namespace App\Repository;

use App\Entity\ENTREPOT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ENTREPOT>
 *
 * @method ENTREPOT|null find($id, $lockMode = null, $lockVersion = null)
 * @method ENTREPOT|null findOneBy(array $criteria, array $orderBy = null)
 * @method ENTREPOT[]    findAll()
 * @method ENTREPOT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ENTREPOTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ENTREPOT::class);
    }

//    /**
//     * @return ENTREPOT[] Returns an array of ENTREPOT objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ENTREPOT
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
