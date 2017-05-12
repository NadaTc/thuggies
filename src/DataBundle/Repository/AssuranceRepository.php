<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 08/04/2017
 * Time: 04:45
 */

namespace DataBundle\Repository;
use Doctrine\ORM\EntityRepository ;


class AssuranceRepository extends EntityRepository
{


    public function stat($b)
    {
        $query = $this->getEntityManager()
            ->createQuery("
        SELECT COUNT (o.idAssurance) AS  sauto FROM DataBundle:Assurance o WHERE o.assurant = :b");
        $query->setParameter('b', $b);
        return $query->getSingleScalarResult() ;

    }
    public function statRef($a)
    {
        $query = $this->getEntityManager()
            ->createQuery("
        SELECT COUNT(o.idAssurance) AS  sauto FROM DataBundle:Assurance o WHERE o.assurant = :a");
        $query->setParameter('a', $a);
        return $query->getSingleScalarResult() ;

    }

    public function statc($c)
    {
        $query = $this->getEntityManager()
            ->createQuery("
        SELECT COUNT(o.idAssurance) AS  sauto FROM DataBundle:Assurance o WHERE o.assurant = :c");
        $query->setParameter('c', $c);
        return $query->getSingleScalarResult() ;

    }



}