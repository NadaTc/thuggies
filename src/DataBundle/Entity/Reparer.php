<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reparer
 *
 * @ORM\Table(name="reparer", indexes={@ORM\Index(name="id_voiture", columns={"id_voiture"})})
 * @ORM\Entity
 */
class Reparer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_reparation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReparation;

    /**
     * @var string
     *
     * @ORM\Column(name="type_panne", type="string", length=50, nullable=false)
     */
    private $typePanne;

    /**
     * @var string
     *
     * @ORM\Column(name="piece_changee", type="string", length=255, nullable=false)
     */
    private $pieceChangee;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

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
    public function getIdReparation()
    {
        return $this->idReparation;
    }

    /**
     * @param int $idReparation
     */
    public function setIdReparation($idReparation)
    {
        $this->idReparation = $idReparation;
    }

    /**
     * @return string
     */
    public function getTypePanne()
    {
        return $this->typePanne;
    }

    /**
     * @param string $typePanne
     */
    public function setTypePanne($typePanne)
    {
        $this->typePanne = $typePanne;
    }

    /**
     * @return string
     */
    public function getPieceChangee()
    {
        return $this->pieceChangee;
    }

    /**
     * @param string $pieceChangee
     */
    public function setPieceChangee($pieceChangee)
    {
        $this->pieceChangee = $pieceChangee;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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

