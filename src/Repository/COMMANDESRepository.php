<?php

namespace App\Repository;

use App\Entity\COMMANDES;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<COMMANDES>
 *
 * @method COMMANDES|null find($id, $lockMode = null, $lockVersion = null)
 * @method COMMANDES|null findOneBy(array $criteria, array $orderBy = null)
 * @method COMMANDES[]    findAll()
 * @method COMMANDES[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class COMMANDESRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, COMMANDES::class);
    }

//    /**
//     * @return COMMANDES[] Returns an array of COMMANDES objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?COMMANDES
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
