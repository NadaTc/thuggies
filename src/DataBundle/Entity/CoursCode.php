<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursCode
 *
 * @ORM\Table(name="cours_code")
 * @ORM\Entity
 */
class CoursCode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cours", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCours;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_cours", type="string", length=50, nullable=false)
     */
    private $titreCours;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_cours", type="text", length=65535, nullable=false)
     */
    private $contenuCours;

    /**
     * @var string
     *
     * @ORM\Column(name="image_cours", type="string", length=255, nullable=true)
     */
    private $imageCours;

    /**
     * @return int
     */
    public function getIdCours()
    {
        return $this->idCours;
    }

    /**
     * @param int $idCours
     */
    public function setIdCours($idCours)
    {
        $this->idCours = $idCours;
    }

    /**
     * @return string
     */
    public function getTitreCours()
    {
        return $this->titreCours;
    }

    /**
     * @param string $titreCours
     */
    public function setTitreCours($titreCours)
    {
        $this->titreCours = $titreCours;
    }

    /**
     * @return string
     */
    public function getContenuCours()
    {
        return $this->contenuCours;
    }

    /**
     * @param string $contenuCours
     */
    public function setContenuCours($contenuCours)
    {
        $this->contenuCours = $contenuCours;
    }

    /**
     * @return string
     */
    public function getImageCours()
    {
        return $this->imageCours;
    }

    /**
     * @param string $imageCours
     */
    public function setImageCours($imageCours)
    {
        $this->imageCours = $imageCours;
    }


}

