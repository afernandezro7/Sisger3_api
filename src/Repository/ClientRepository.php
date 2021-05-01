<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    /**
     * @return Client[] Returns an array of Client objects
     */
    public function findClientByFullName()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\Client c ORDER BY c.createdAt DESC ');
        return $query->getResult();
    }

    /**
     * @return Client[] Returns an array of Client objects
     */
    public function findClientsByUserAndMonth($operator, $from, $to)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\Client c WHERE c.user = :operator AND c.createdAt BETWEEN :from AND :to');
        $query->setParameter('operator', $operator);
        $query->setParameter('from', $from);
        $query->setParameter('to', $to);


        return $query->getResult();
    }

    /**
     * @return Client[] Returns an array of Client objects
     */
    public function findClientsWithNoUserOrderedDesc($user)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\Client c WHERE c.user != :user ORDER BY c.createdAt DESC');
        $query->setParameter('user', $user);

        return $query->getResult();
    }

    /**
     * @return Client[] Returns an array of Client objects
     */
    public function findByUserOrderedDesc()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\Client c ORDER BY c.createdAt DESC');


        return $query->getResult();
    }

    public function findBusquedaSimple($text)
    {
        $text = '%' . $text . '%';
        $text1 = $text . '%';
        $text2 = '%' . $text;


        $em = $this->getEntityManager();
        $query = $em->createQuery(
            "SELECT r FROM App\Entity\Client r ".
            "WHERE (r.firstName LIKE :query OR ".
                   "r.firstName LIKE :query1 OR ". 
                   "r.firstName LIKE :query2 OR  ".
                   "r.lastName LIKE :query OR  ".
                   "r.lastName LIKE :query1 OR  ".
                   "r.lastName LIKE :query2 OR  ".
                   "CONCAT(r.firstName, ' ', r.lastName) LIKE :query OR  ".
                   "CONCAT(r.firstName, ' ', r.lastName) LIKE :query1 OR  ".
                   "CONCAT(r.firstName, ' ', r.lastName) LIKE :query2)  ".
            "ORDER BY r.createdAt DESC"
        );
        $query->setParameter('query', $text);
        $query->setParameter('query1', $text1);
        $query->setParameter('query2', $text2);
        return $query->getResult();
    }

    // /**
    //  * @return Client[] Returns an array of Client objects
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
    public function findOneBySomeField($value): ?Client
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
