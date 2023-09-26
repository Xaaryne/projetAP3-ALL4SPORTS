<?php

namespace App\Repository;

use App\Entity\CLIENTSPORT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CLIENTSPORT>
 *
 * @method CLIENTSPORT|null find($id, $lockMode = null, $lockVersion = null)
 * @method CLIENTSPORT|null findOneBy(array $criteria, array $orderBy = null)
 * @method CLIENTSPORT[]    findAll()
 * @method CLIENTSPORT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CLIENTSPORTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CLIENTSPORT::class);
    }

//    /**
//     * @return CLIENTSPORT[] Returns an array of CLIENTSPORT objects
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

//    public function findOneBySomeField($value): ?CLIENTSPORT
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
