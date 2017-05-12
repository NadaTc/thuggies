<?php
/**
 * Created by PhpStorm.
 * User: Nada
 * Date: 24/04/2017
 * Time: 02:14
 */

namespace DataBundle\Entity;
use Doctrine\ORM\Mapping as ORM;



/**
 * module
 *
 * @ORM\Table(name="Module")
 * @ORM\Entity

 */
class Module
{

    /**
     *
     * @ORM\Column(name="id_Module", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModule;

    /**
     * @ORM\ManyToOne(targetEntity="CoursCode")
     * @ORM\JoinColumn(name="id_cours", referencedColumnName="id_cours")
     */
    private $cours;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @return int
     */
    public function getIdModule()
    {
        return $this->idModule;
    }


    public function setIdModule($idModule)
    {
        $this->idModule = $idModule;
    }

    /**
     * @return mixed
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * @param mixed $cours
     */
    public function setCours($cours)
    {
        $this->cours = $cours;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }




}