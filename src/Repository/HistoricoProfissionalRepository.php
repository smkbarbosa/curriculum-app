<?php

namespace App\Repository;

use App\Entity\HistoricoProfissional;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HistoricoProfissional|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoricoProfissional|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoricoProfissional[]    findAll()
 * @method HistoricoProfissional[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoricoProfissionalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HistoricoProfissional::class);
    }

    // /**
    //  * @return HistoricoProfissional[] Returns an array of HistoricoProfissional objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistoricoProfissional
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
