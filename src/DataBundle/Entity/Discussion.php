<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Commentaire
 *
 * @ORM\Table(name="discussion")
 * @ORM\Entity(repositoryClass="DataBundle\Entity\DiscRepository")
 * @Vich\Uploadable
 */
class Discussion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_discussion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDiscussion;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_discussion", type="string", length=255, nullable=false)
     */
    private $titreDiscussion;

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
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName", size="imageSize")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255,  nullable=true)
     *
     * @var string
     */
    private $imageName;
    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;
    /**
     * @ORM\Column(name="date_disc",type="date",nullable=true)
     */
    private $dateDisc;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomUtilisateur;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Discussion
     */
    /**
     * @return int
     */
    public function getIdDiscussion()
    {
        return $this->idDiscussion;
    }

    /**
     * @param int $idDiscussion
     */
    public function setIdDiscussion($idDiscussion)
    {
        $this->idDiscussion = $idDiscussion;
    }

    /**
     * @return string
     */
    public function getTitreDiscussion()
    {
        return $this->titreDiscussion;
    }

    /**
     * @param string $titreDiscussion
     */
    public function setTitreDiscussion($titreDiscussion)
    {
        $this->titreDiscussion = $titreDiscussion;
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



    /**
     * @return mixed
     */
    public function getDateDisc()
    {
        return $this->dateDisc;
    }

    /**
     * @param mixed $dateDisc
     */
    public function setDateDisc($dateDisc)
    {
        $this->dateDisc = $dateDisc;
    }

    /**
     * @return mixed
     */
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * @param mixed $nomUtilisateur
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


    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
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
     * @return Discussion
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


}

