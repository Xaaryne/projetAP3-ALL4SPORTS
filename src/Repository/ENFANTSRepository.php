<?php

namespace App\Repository;

use App\Entity\ENFANTS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ENFANTS>
 *
 * @method ENFANTS|null find($id, $lockMode = null, $lockVersion = null)
 * @method ENFANTS|null findOneBy(array $criteria, array $orderBy = null)
 * @method ENFANTS[]    findAll()
 * @method ENFANTS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ENFANTSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ENFANTS::class);
    }

//    /**
//     * @return ENFANTS[] Returns an array of ENFANTS objects
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

//    public function findOneBySomeField($value): ?ENFANTS
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
