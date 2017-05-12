<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 28/03/2017
 * Time: 16:12
 */

namespace DataBundle\Entity;
use Doctrine\ORM\EntityRepository;

class DiscRepository extends EntityRepository
{
    public function OrderDateDQL(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  ORDER BY d.dateDisc DESC ");
       return $query->getResult();
    }

    public function FindAlld(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  ");
        return $query->getResult();
    }

    public function CountPannM(){
        $query = $this->getEntityManager()->createQuery("select COUNT (d.categorie) from DataBundle:Discussion d  WHERE d.categorie='Panne Mecanique'");
        $result = $query->getSingleScalarResult();
    }
    public function  CountPanneM()
    {
        $query = $this->getEntityManager()
            ->createQuery("
        SELECT COUNT (d.idDiscussion) AS  sauto FROM DataBundle:Discussion d  WHERE d.categorie = :'Panne Mecanique'");

        return $query->getSingleScalarResult() ;

    }




    public function PanneM(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  WHERE d.categorie='Panne Mecanique'");
        return $query->getResult();
    }

    public function PanneE(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  WHERE d.categorie='Panne Electrique'");
        return $query->getResult();
    }

    public function ToPe(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  WHERE d.categorie='Tolier Et Peinture'");
        return $query->getResult();
    }

    public function CPneu(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  WHERE d.categorie='Changement De Pneu'");
        return $query->getResult();
    }

    public function PanneT(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  WHERE d.categorie='Panne Tapissier'");
        return $query->getResult();
    }

    public function PanneR(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  WHERE d.categorie='Panne Radiateur'");
        return $query->getResult();
    }

    public function MG(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  WHERE d.categorie='Mecanique Generale'");
        return $query->getResult();
    }

    public function Autre(){
        $query = $this->getEntityManager()->createQuery("select d from DataBundle:Discussion d  WHERE d.categorie='Autres'");
        return $query->getResult();
    }




    public function findTitre($key) {
        $query = $this->getEntityManager()
            ->createQuery("SELECT d FROM DataBundle:Discussion d WHERE d.titreDiscussion LIKE :key ");
        $query->setParameter('key', '%'.$key.'%');
        return $query->getResult();
    }



}