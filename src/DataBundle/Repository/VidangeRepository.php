<?php
namespace DataBundle\Repository ;
use Doctrine\ORM\EntityRepository ;
use DataBundle\Entity ;
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 06/04/2017
 * Time: 23:53
 */
class VidangeRepository extends EntityRepository
{

    function findParametreDQL($id)

    { $query = $this->_em->createQuery('SELECT MAX(a.kilometrage)
 FROM DataBundle:Vidange a 
 WHERE a.idVoiture = :id');
        //String req=" SELECT MAX(`Kilometrage`) FROM `Vidange` where `id_voiture` = '"+id+"' ";

        $query->setParameter('id', $id);

        // Utilisation de getSingleResult car la requête ne doit retourner qu'un seul résultat
        return $query->getResult();

    }

    function findkmmax()

    { $query = $this->_em->createQuery('SELECT MAX(a.kilometrage)
 FROM DataBundle:Vidange a ');
        //String req=" SELECT MAX(`Kilometrage`) FROM `Vidange` where `id_voiture` = '"+id+"' ";



        // Utilisation de getSingleResult car la requête ne doit retourner qu'un seul résultat
        return $query->getResult();

    }

    public function findVidangeQB($id) {
        $query=$this->getEntityManager()->createQuery("SELECT MAX (a.kilometrage) from DataBundle:Vidange a where a.idVoiture=:id ")
->setParameter('id',$id);

        return $query ->getResult();
    }



}



