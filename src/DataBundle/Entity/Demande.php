<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_demande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDemande;


    private $idFos ;





    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="cin", type="integer", nullable=false)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="recto_cin", type="string", length=40, nullable=false)
     */
    private $rectoCin;

    /**
     * @var \string
     *
     * @ORM\Column(name="date_naisance", type="string", nullable=true)
     */
    private $dateNaisance;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_passeport", type="integer", nullable=false)
     */
    private $numPasseport;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=20, nullable=false)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=false)
     */
    private $etat;

    /**
     * @return int
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param int $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return int
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param int $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return string
     */
    public function getRectoCin()
    {
        return $this->rectoCin;
    }

    /**
     * @param string $rectoCin
     */
    public function setRectoCin($rectoCin)
    {
        $this->rectoCin = $rectoCin;
    }

    /**
     * @return \DateTime
     */
    public function getDateNaisance()
    {
        return $this->dateNaisance;
    }

    /**
     * @return mixed
     */
    public function getIdFos()
    {
        return $this->idFos;
    }

    /**
     * @param mixed $idFos
     */
    public function setIdFos($idFos)
    {
        $this->idFos = $idFos;
    }



    /**
     * @param \DateTime $dateNaisance
     */
    public function setDateNaisance($dateNaisance)
    {
        $this->dateNaisance = $dateNaisance;
    }

    /**
     * @return int
     */
    public function getNumPasseport()
    {
        return $this->numPasseport;
    }

    /**
     * @param int $numPasseport
     */
    public function setNumPasseport($numPasseport)
    {
        $this->numPasseport = $numPasseport;
    }

    /**
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param string $nationalite
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


}

