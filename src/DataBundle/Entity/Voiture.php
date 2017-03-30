<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 *
 * @ORM\Table(name="voiture")
 * @ORM\Entity
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


}

