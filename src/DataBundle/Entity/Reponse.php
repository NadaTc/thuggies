<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity
 */
class Reponse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_reponse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReponse;

    /**
     * @var string
     *
     * @ORM\Column(name="alt1", type="string", length=255, nullable=false)
     */
    private $alt1;

    /**
     * @var string
     *
     * @ORM\Column(name="alt2", type="string", length=255, nullable=false)
     */
    private $alt2;

    /**
     * @var string
     *
     * @ORM\Column(name="alt3", type="string", length=90, nullable=false)
     */
    private $alt3;

    /**
     * @var string
     *
     * @ORM\Column(name="rep_correcte", type="string", length=50, nullable=false)
     */
    private $repCorrecte;


}

