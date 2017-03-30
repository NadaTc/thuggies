<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accept
 *
 * @ORM\Table(name="accept")
 * @ORM\Entity
 */
class Accept
{
    /**
     * @var string
     *
     * @ORM\Column(name="agent_name", type="string", length=50, nullable=false)
     */
    private $agentName;

    /**
     * @var string
     *
     * @ORM\Column(name="date_dexaman", type="string", length=50, nullable=false)
     */
    private $dateDexaman;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=10, nullable=false)
     */
    private $prix;

    /**
     * @var \Demande
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Demande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_accept", referencedColumnName="id_demande")
     * })
     */
    private $idAccept;


}

