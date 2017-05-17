<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="id_actualite", columns={"id_actualite"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="text_commentaire", type="text", length=65535, nullable=false)
     */
    private $textCommentaire;

    /**
     * @var \Actualite
     *
     * @ORM\ManyToOne(targetEntity="Actualite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_actualite", referencedColumnName="id_actualite")
     * })
     */
    private $idActualite;

    /**
     * @return int
     */
    public function getIdCommentaire()
    {
        return $this->idCommentaire;
    }

    /**
     * @param int $idCommentaire
     */
    public function setIdCommentaire($idCommentaire)
    {
        $this->idCommentaire = $idCommentaire;
    }

    /**
     * @return string
     */
    public function getTextCommentaire()
    {
        return $this->textCommentaire;
    }

    /**
     * @param string $textCommentaire
     */
    public function setTextCommentaire($textCommentaire)
    {
        $this->textCommentaire = $textCommentaire;
    }

    /**
     * @return \Actualite
     */
    public function getIdActualite()
    {
        return $this->idActualite;
    }

    /**
     * @param \Actualite $idActualite
     */
    public function setIdActualite($idActualite)
    {
        $this->idActualite = $idActualite;
    }


}

