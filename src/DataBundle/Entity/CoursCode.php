<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
/**
 * CoursCode
 *
 * @ORM\Table(name="cours_code")
 * @ORM\Entity
 * @Vich\Uploadable
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="cours_image", fileNameProperty="imageName", size="imageSize")
     * @Assert\File(maxSize="1200k",mimeTypes={"image/png", "image/jpeg", "image/pjpeg"})
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;
    /**
     * @ORM\Column(name="nb_vote", type="integer", nullable=true)
     */
    private $nbvote ;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return CoursCode
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return CoursCode
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param integer $imageSize
     *
     * @return CoursCode
     */
    public function setImageSize($imageSize)
    {
        $this->imagesize = $imageSize;

        return $this;
    }

    /**
     * @return integer|null
     */
    public function getImageSize()
    {
        return $this->imageSize;
    }

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
     * @return mixed
     */
    public function getNbvote()
    {
        return $this->nbvote;
    }

    /**
     * @param mixed $nbvote
     */
    public function setNbvote($nbvote)
    {
        $this->nbvote = $nbvote;
    }





}

