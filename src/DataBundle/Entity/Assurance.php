<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assurance
 *
 * @ORM\Table(name="assurance", indexes={@ORM\Index(name="id_carnet", columns={"id_voiture"})})
 * @ORM\Entity(repositoryClass="DataBundle\Repository\AssuranceRepository")
 */
class Assurance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_assurance", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAssurance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="valeur", type="integer", nullable=false)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="assurant", type="string", length=255, nullable=false)
     */
    private $assurant;

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
    public function getIdAssurance()
    {
        return $this->idAssurance;
    }

    /**
     * @param int $idAssurance
     */
    public function setIdAssurance($idAssurance)
    {
        $this->idAssurance = $idAssurance;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param int $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * @return string
     */
    public function getAssurant()
    {
        return $this->assurant;
    }

    /**
     * @param string $assurant
     */
    public function setAssurant($assurant)
    {
        $this->assurant = $assurant;
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

