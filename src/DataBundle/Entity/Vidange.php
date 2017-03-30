<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vidange
 *
 * @ORM\Table(name="vidange", indexes={@ORM\Index(name="id_carnet", columns={"id_voiture"})})
 * @ORM\Entity
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


}

