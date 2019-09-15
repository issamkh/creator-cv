<?php

namespace App\Repository;

use App\Entity\CategoriePortfolio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoriePortfolio|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriePortfolio|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriePortfolio[]    findAll()
 * @method CategoriePortfolio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriePortfolioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoriePortfolio::class);
    }

    // /**
    //  * @return CategoriePortfolio[] Returns an array of CategoriePortfolio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoriePortfolio
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
