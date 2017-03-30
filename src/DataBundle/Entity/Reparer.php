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


}

