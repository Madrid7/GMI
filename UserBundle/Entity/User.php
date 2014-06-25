<?php

namespace GMI\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     * @ORM\Column(name="facebook_id", type="bigint",nullable=true)
     */
    protected $facebookId;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_access_token", type="string", length=255,nullable=true)
     */
    protected $facebookAccessToken;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50,nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=10,nullable=true)
     */
    protected $sex;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255,nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=20,nullable=true)
     */
    protected $town;

    /**
     * @var integer
     *
     * @ORM\Column(name="cp", type="string", length=20,nullable=true)
     */
    protected $cp;

    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set facebookId
     *
     * @param integer $facebookId
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return integer 
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string 
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return User
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return User
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }
}
