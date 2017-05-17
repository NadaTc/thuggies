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
     * @var integer
     *
     * @ORM\Column(name="id_accept", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAccept;

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
     * @return int
     */
    public function getIdAccept()
    {
        return $this->idAccept;
    }

    /**
     * @param int $idAccept
     */
    public function setIdAccept($idAccept)
    {
        $this->idAccept = $idAccept;
    }

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


}

