<?php
namespace MyApp\UserBundle \Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;
/**
 * Created by PhpStorm.
 * User: Nada
 * Date: 25/03/2017
 * Time: 16:47
 */

/**

 * @ORM\Entity

 * @ORM\Table(name="user")

 */
class User extends BaseUser
{
    /**

     * @ORM\Id

     * @ORM\Column(type="integer")

     * @ORM\GeneratedValue(strategy="AUTO")

     */

    protected $id;
}