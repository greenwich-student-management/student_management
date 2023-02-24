<?php

namespace App\Repository;

use App\Entity\Studentmanagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Studentmanagement>
 *
 * @method Studentmanagement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Studentmanagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Studentmanagement[]    findAll()
 * @method Studentmanagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentmanagementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Studentmanagement::class);
    }

    public function save(Studentmanagement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Studentmanagement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
       /**
    * @return Studentmanagement[] Returns an array of Studentmanagement objects
    */
   public function findByExampleField($value): array
   {
       return $this->createQueryBuilder('s')
           ->andWhere('s.exampleField = :val')
           ->setParameter('val', $value)
           ->orderBy('s.id', 'ASC')
           ->setMaxResults(10)
           ->getQuery()
           ->getResult()
       ;
   }

//    /**
//     * @return Studentmanagement[] Returns an array of Studentmanagement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Studentmanagement
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
