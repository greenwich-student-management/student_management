<?php

namespace App\Repository;

use App\Entity\Subjectmanagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Subjectmanagement>
 *
 * @method Subjectmanagement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subjectmanagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subjectmanagement[]    findAll()
 * @method Subjectmanagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubjectmanagementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subjectmanagement::class);
    }

    public function save(Subjectmanagement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Subjectmanagement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Subjectmanagement[] Returns an array of Subjectmanagement objects
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

//    public function findOneBySomeField($value): ?Subjectmanagement
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
