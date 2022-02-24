<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    /**
    * @return null|Customer[] Returns an array of Customer objects
    */
    public function findBySearch($value)
    {
        return $this->createQueryBuilder('c')
            ->orWhere('c.name LIKE :name')
            ->orWhere('c.phone LIKE :phone')
            ->orWhere('c.phone2 LIKE :phone2')
            ->orWhere('c.email LIKE :email')
            ->orWhere('c.company LIKE :company')
            ->setParameter('name', "%".$value."%")
            ->setParameter('phone', "%".$value."%")
            ->setParameter('phone2', "%".$value."%")
            ->setParameter('email', "%".$value."%")
            ->setParameter('company', "%".$value."%")
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Customer
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
