<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 10/04/2017
 * Time: 01:41
 */

namespace DataBundle\Repository;
use Doctrine\ORM\EntityRepository ;


class VoitureRepository extends EntityRepository
{


    function findSerieDQL ($serie) {
        $query=$this->getEntityManager()
            ->createQuery("select v from DataBundle:Voiture v
                              WHERE v.immatricule=:immatricule
                               AND v.datemarche<=CURRENT_DATE ()
                                ORDER BY v.datemarche ASC ")->setParameter('immatricule', $serie) ;
        return $query->getResult() ;

    }





}