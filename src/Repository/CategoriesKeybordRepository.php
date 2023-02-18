<?php

namespace App\Repository;

use App\Entity\CategoriesKeybord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoriesKeybord>
 *
 * @method CategoriesKeybord|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesKeybord|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesKeybord[]    findAll()
 * @method CategoriesKeybord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesKeybordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriesKeybord::class);
    }

    public function save(CategoriesKeybord $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoriesKeybord $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CategoriesKeybord[] Returns an array of CategoriesKeybord objects
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

//    public function findOneBySomeField($value): ?CategoriesKeybord
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
