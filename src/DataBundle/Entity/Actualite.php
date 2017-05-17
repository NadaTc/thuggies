<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Actualite
 *
 * @ORM\Table(name="actualite")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Actualite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_actualite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActualite;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_actualite", type="string", length=255, nullable=false)
     */
    private $titreActualite;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_actualite", type="string", length=255, nullable=false)
     */
    private $contenuActualite;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text", length=65535, nullable=false)
     */
    private $descriptif;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=false)
     */
    private $categorie;



    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="actualite_image", fileNameProperty="imageName", size="imageSize")
     * @Assert\File(maxSize="1200k",mimeTypes={"image/png", "image/jpeg", "image/pjpeg"})
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer",nullable=true)
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    /**
     * @ORM\Column(name="nb_vote", type="integer", nullable=true)
     */
    private $nbvote ;

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


    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Actualite
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
     * @return Actualite
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
     * @return Actualite
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
    public function getIdActualite()
    {
        return $this->idActualite;
    }

    /**
     * @param int $idActualite
     */
    public function setIdActualite($idActualite)
    {
        $this->idActualite = $idActualite;
    }

    /**
     * @return string
     */
    public function getTitreActualite()
    {
        return $this->titreActualite;
    }

    /**
     * @param string $titreActualite
     */
    public function setTitreActualite($titreActualite)
    {
        $this->titreActualite = $titreActualite;
    }

    /**
     * @return string
     */
    public function getContenuActualite()
    {
        return $this->contenuActualite;
    }

    /**
     * @param string $contenuActualite
     */
    public function setContenuActualite($contenuActualite)
    {
        $this->contenuActualite = $contenuActualite;
    }

    /**
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @param string $descriptif
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }




}

