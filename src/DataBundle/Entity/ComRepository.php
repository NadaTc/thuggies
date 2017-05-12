<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 21/03/2017
 * Time: 14:38
 */

namespace DataBundle\Entity;
use Doctrine\ORM\EntityRepository;

class ComRepository extends EntityRepository
{
    public function ajoutParameter($id_dis){
        $query = $this->getEntityManager()->createQuery("select com from DataBundle:CommentaireDiscussion com where com.idDisc=:id_dis  
ORDER BY com.dateCom DESC ")
            ->setParameter('id_dis',$id_dis);
        return $query->getResult();
    }

}