<?php
/**
 * Created by PhpStorm.
 * User: Nada
 * Date: 08/04/2017
 * Time: 03:27
 */

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Map
 *
 * @ORM\Table(name="Places")
 * @ORM\Entity
 */class Places
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_place", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPlace;


    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=50, nullable=false)
     */
    private $place ;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="float",  nullable=false)
     */
    private $lang ;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="float",  nullable=false)
     */
    private $lat ;

    /**
     * @return int
     */
    public function getIdPlace()
    {
        return $this->idPlace;
    }

    /**
     * @param int $idPlace
     */
    public function setIdPlace($idPlace)
    {
        $this->idPlace = $idPlace;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }




}