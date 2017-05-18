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

    /**
     * @return string
     */
    public function getAgentName()
    {
        return $this->agentName;
    }

    /**
     * @param string $agentName
     */
    public function setAgentName($agentName)
    {
        $this->agentName = $agentName;
    }

    /**
     * @return string
     */
    public function getDateDexaman()
    {
        return $this->dateDexaman;
    }

    /**
     * @param string $dateDexaman
     */
    public function setDateDexaman($dateDexaman)
    {
        $this->dateDexaman = $dateDexaman;
    }

    /**
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param string $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return \Demande
     */
    public function getIdAccept()
    {
        return $this->idAccept;
    }

    /**
     * @param \Demande $idAccept
     */
    public function setIdAccept($idAccept)
    {
        $this->idAccept = $idAccept;
    }


}

