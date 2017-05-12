<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VisiteTechnique
 *
 * @ORM\Table(name="visite _technique", indexes={@ORM\Index(name="id_carnet", columns={"id_voiture"})})
 * @ORM\Entity
 */
class VisiteTechnique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_visite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVisite;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="desciption", type="string", length=255, nullable=false)
     */
    private $desciption;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_visite", type="date", nullable=false)
     */
    private $dateDeVisite;

    /**
     * @var \Voiture
     *
     * @ORM\ManyToOne(targetEntity="Voiture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voiture", referencedColumnName="id_voiture")
     * })
     */
    private $idVoiture;

    /**
     * @return int
     */
    public function getIdVisite()
    {
        return $this->idVisite;
    }

    /**
     * @param int $idVisite
     */
    public function setIdVisite($idVisite)
    {
        $this->idVisite = $idVisite;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDesciption()
    {
        return $this->desciption;
    }

    /**
     * @param string $desciption
     */
    public function setDesciption($desciption)
    {
        $this->desciption = $desciption;
    }

    /**
     * @return \DateTime
     */
    public function getDateDeVisite()
    {
        return $this->dateDeVisite;
    }

    /**
     * @param \DateTime $dateDeVisite
     */
    public function setDateDeVisite($dateDeVisite)
    {
        $this->dateDeVisite = $dateDeVisite;
    }

    /**
     * @return \Voiture
     */
    public function getIdVoiture()
    {
        return $this->idVoiture;
    }

    /**
     * @param \Voiture $idVoiture
     */
    public function setIdVoiture($idVoiture)
    {
        $this->idVoiture = $idVoiture;
    }


}

