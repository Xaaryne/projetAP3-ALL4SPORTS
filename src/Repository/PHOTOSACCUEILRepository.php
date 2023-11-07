<?php

namespace App\Repository;

use App\Entity\PHOTOSACCUEIL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PHOTOSACCUEIL>
 *
 * @method PHOTOSACCUEIL|null find($id, $lockMode = null, $lockVersion = null)
 * @method PHOTOSACCUEIL|null findOneBy(array $criteria, array $orderBy = null)
 * @method PHOTOSACCUEIL[]    findAll()
 * @method PHOTOSACCUEIL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PHOTOSACCUEILRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PHOTOSACCUEIL::class);
    }

//    /**
//     * @return PHOTOSACCUEIL[] Returns an array of PHOTOSACCUEIL objects
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

//    public function findOneBySomeField($value): ?PHOTOSACCUEIL
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
