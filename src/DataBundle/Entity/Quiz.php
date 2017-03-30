<?php
/**
 * Created by PhpStorm.
 * User: Nada
 * Date: 29/03/2017
 * Time: 18:08
 */

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;



/**
 * Quiz
 *
 * @ORM\Table(name="Quiz")
 * @ORM\Entity
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
     * @ORM\Column(name="al3", type="text", length=255, nullable=false)
     */

    private $alt3 ;


    /**
     * @var string
     *
     * @ORM\Column(name="img", type="text", length=255, nullable=true)
     */
    private $img ;

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
     * @return mixed
     */


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

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }





}