<?php

namespace App\Repository;

use App\Entity\CLIENTSPORTS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CLIENTSPORTS>
 *
 * @method CLIENTSPORTS|null find($id, $lockMode = null, $lockVersion = null)
 * @method CLIENTSPORTS|null findOneBy(array $criteria, array $orderBy = null)
 * @method CLIENTSPORTS[]    findAll()
 * @method CLIENTSPORTS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CLIENTSPORTSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CLIENTSPORTS::class);
    }

//    /**
//     * @return CLIENTSPORTS[] Returns an array of CLIENTSPORTS objects
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

//    public function findOneBySomeField($value): ?CLIENTSPORTS
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
