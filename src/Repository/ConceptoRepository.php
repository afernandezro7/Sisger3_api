<?php

namespace App\Repository;

use App\Entity\Concepto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Concepto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Concepto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Concepto[]    findAll()
 * @method Concepto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConceptoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concepto::class);
    }

    public function findXTipoXContenedor($tipo, $contenedor)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\Concepto c WHERE c.tipo = :tipo AND c.contenedor = :contenedor');
        $query->setParameter('tipo', $tipo);
        $query->setParameter('contenedor', $contenedor);
        return $query->getResult();
    }

    /**
     * @return Concepto[] Returns an array of Concepto objects
     */
    public function findBusquedaSimple($text)
    {
        $value = '%' . $text . '%';

        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT c, e, n FROM BackendBundle:Concepto c JOIN c.consignado e JOIN c.contenedor n WHERE c.sisgerCode LIKE :query OR CONCAT(e.firstName, ' ', e.lastName) LIKE :query OR e.dni LIKE :query OR e.passport LIKE :query ORDER BY c.fechaCreacion DESC");
        $query->setParameter('query', $value);
        /*$query->setMaxResults(1000);*/
        return $query->getResult();
    }

    // /**
    //  * @return Concepto[] Returns an array of Concepto objects
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
    public function findOneBySomeField($value): ?Concepto
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
