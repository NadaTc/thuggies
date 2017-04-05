<?php
/**
 * Created by PhpStorm.
 * User: Nada
 * Date: 29/03/2017
 * Time: 18:08
 */

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;



/**
 * Quiz
 *
 * @ORM\Table(name="Quiz")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Quiz
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id_Quiz", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuiz;

    /**
     *@ORM\ManyToOne(targetEntity="Test")
     *@ORM\JoinColumn(name="id_test", referencedColumnName="id_test")
     */
    private $test ;


    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text", length=255, nullable=false)
     */
    private $question ;

    /**
     * @var string
     *
     * @ORM\Column(name="al1", type="text", length=255, nullable=false)
     */
    private $alt1 ;

    /**
     * @var string
     *
     * @ORM\Column(name="al2", type="text", length=255, nullable=false)
     */

    private $al2 ;


    /**
     * @var string
     *
     * @ORM\Column(name="al3", type="text", length=255, nullable=true)
     */

    private $alt3 ;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="quiz_image", fileNameProperty="imageName", size="imageSize")
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
     * @ORM\Column(type="integer", nullable=true)
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
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
     * @return Quiz
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
     * @return Quiz
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
     * @return Quiz
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
    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    /**
     * @param int $idQuiz
     */
    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;
    }

    /**
     * @return mixed
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param mixed $test
     */
    public function setTest($test)
    {
        $this->test = $test;
    }



    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getAlt1()
    {
        return $this->alt1;
    }

    /**
     * @param string $alt1
     */
    public function setAlt1($alt1)
    {
        $this->alt1 = $alt1;
    }

    /**
     * @return string
     */
    public function getAl2()
    {
        return $this->al2;
    }

    /**
     * @param string $al2
     */
    public function setAl2($al2)
    {
        $this->al2 = $al2;
    }

    /**
     * @return string
     */
    public function getAlt3()
    {
        return $this->alt3;
    }

    /**
     * @param string $alt3
     */
    public function setAlt3($alt3)
    {
        $this->alt3 = $alt3;
    }







}