<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 *
 * @ORM\Table(name="voiture")
 * @ORM\Entity(repositoryClass="DataBundle\Repository\VoitureRepository")
 */
class Voiture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_voiture", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="immatricule", type="string", length=50, nullable=false)
     */
    private $immatricule;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=20, nullable=false)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=20, nullable=false)
     */
    private $modele;

    /**
     * @var string
     *
     * @ORM\Column(name="typecarburant", type="string", length=20, nullable=false)
     */
    private $typecarburant;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbcheveaux", type="integer", nullable=false)
     */
    private $nbcheveaux;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemarche", type="date", nullable=false)
     */
    private $datemarche;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_place", type="integer", nullable=false)
     */
    private $nbrPlace;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @return int
     */
    public function getIdVoiture()
    {
        return $this->idVoiture;
    }

    /**
     * @param int $idVoiture
     */
    public function setIdVoiture($idVoiture)
    {
        $this->idVoiture = $idVoiture;
    }

    /**
     * @return string
     */
    public function getImmatricule()
    {
        return $this->immatricule;
    }

    /**
     * @param string $immatricule
     */
    public function setImmatricule($immatricule)
    {
        $this->immatricule = $immatricule;
    }

    /**
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param string $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param string $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    /**
     * @return string
     */
    public function getTypecarburant()
    {
        return $this->typecarburant;
    }

    /**
     * @param string $typecarburant
     */
    public function setTypecarburant($typecarburant)
    {
        $this->typecarburant = $typecarburant;
    }

    /**
     * @return int
     */
    public function getNbcheveaux()
    {
        return $this->nbcheveaux;
    }

    /**
     * @param int $nbcheveaux
     */
    public function setNbcheveaux($nbcheveaux)
    {
        $this->nbcheveaux = $nbcheveaux;
    }

    /**
     * @return \DateTime
     */
    public function getDatemarche()
    {
        return $this->datemarche;
    }

    /**
     * @param \DateTime $datemarche
     */
    public function setDatemarche($datemarche)
    {
        $this->datemarche = $datemarche;
    }

    /**
     * @return int
     */
    public function getNbrPlace()
    {
        return $this->nbrPlace;
    }

    /**
     * @param int $nbrPlace
     */
    public function setNbrPlace($nbrPlace)
    {
        $this->nbrPlace = $nbrPlace;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


}

