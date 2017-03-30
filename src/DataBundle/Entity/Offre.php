<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="id_voiture", columns={"id_voiture"})})
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=200, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=40, nullable=true)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=40, nullable=true)
     */
    private $modele;

    /**
     * @var integer
     *
     * @ORM\Column(name="Prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_offre", type="date", nullable=false)
     */
    private $dateOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text", length=65535, nullable=false)
     */
    private $descriptif;

    /**
     * @var string
     *
     * @ORM\Column(name="image_offre", type="blob", length=65535, nullable=false)
     */
    private $imageOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="image2", type="blob", length=65535, nullable=true)
     */
    private $image2;

    /**
     * @var string
     *
     * @ORM\Column(name="image3", type="blob", length=65535, nullable=true)
     */
    private $image3;

    /**
     * @var string
     *
     * @ORM\Column(name="image4", type="blob", length=65535, nullable=true)
     */
    private $image4;

    /**
     * @var string
     *
     * @ORM\Column(name="image5", type="blob", length=65535, nullable=true)
     */
    private $image5;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_de_tel", type="string", length=255, nullable=true)
     */
    private $numeroDeTel;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_voiture", type="integer", nullable=false)
     */
    private $idVoiture;


}

