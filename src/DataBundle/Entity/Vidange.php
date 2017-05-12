<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Vidange
 *
 * @ORM\Table(name="vidange", indexes={@ORM\Index(name="id_carnet", columns={"id_voiture"})})
 * @ORM\Entity(repositoryClass="DataBundle\Repository\VidangeRepository")
 */
class Vidange
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vidange", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVidange;

    /**
     * @var integer
     *
     * @ORM\Column(name="Kilometrage", type="integer", nullable=false)
     */
    private $kilometrage;

    /**
     * @var string
     *
     * @ORM\Column(name="Lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_vidange", type="date", nullable=false)
     */
    private $dateVidange;

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
    public function getIdVidange()
    {
        return $this->idVidange;
    }

    /**
     * @param int $idVidange
     */
    public function setIdVidange($idVidange)
    {
        $this->idVidange = $idVidange;
    }

    /**
     * @return int
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * @param int $kilometrage
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;
    }

    /**
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param string $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return \DateTime
     */
    public function getDateVidange()
    {
        return $this->dateVidange;
    }

    /**
     * @param \DateTime $dateVidange
     */
    public function setDateVidange($dateVidange)
    {
        $this->dateVidange = $dateVidange;
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

