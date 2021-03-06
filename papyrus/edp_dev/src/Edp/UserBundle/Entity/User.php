<?php
// src/Acme/UserBundle/Entity/User.php

namespace Edp\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
class User extends BaseUser
{
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Edp\MainBundle\Entity\abonnement", mappedBy="utilisateurs") 
     */
    private $abonnements;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Edp\MainBundle\Entity\code", mappedBy="utilisateurs") 
     */
    private $codes;
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string", length=10)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     */
    protected $genre;
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your principal adress.", groups={"Registration", "Profile"})
     */
    protected $principal_adress;
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your principal adress.", groups={"Registration", "Profile"})
     */
    protected $principal_adress2;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Please enter your principal zipcode.", groups={"Registration", "Profile"})
     */
    protected $zipcode;
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your principal zipcode.", groups={"Registration", "Profile"})
     */
    protected $country;
    
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

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
     * Add abonnements
     *
     * @param \Edp\MainBundle\Entity\abonnement $abonnements
     * @return User
     */
    public function addAbonnement(\Edp\MainBundle\Entity\abonnement $abonnements)
    {
        $this->abonnements[] = $abonnements;

        return $this;
    }

    /**
     * Remove abonnements
     *
     * @param \Edp\MainBundle\Entity\abonnement $abonnements
     */
    public function removeAbonnement(\Edp\MainBundle\Entity\abonnement $abonnements)
    {
        $this->abonnements->removeElement($abonnements);
    }

    /**
     * Get abonnements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAbonnements()
    {
        return $this->abonnements;
    }

    /**
     * Add adresses
     *
     * @param \Edp\MainBundle\Entity\abonnement $adresses
     * @return User
     */
    public function addAdress(\Edp\MainBundle\Entity\abonnement $adresses)
    {
        $this->adresses[] = $adresses;

        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \Edp\MainBundle\Entity\abonnement $adresses
     */
    public function removeAdress(\Edp\MainBundle\Entity\abonnement $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
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
     * Set genre
     *
     * @param string $genre
     * @return User
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set principal_adress
     *
     * @param string $principalAdress
     * @return User
     */
    public function setPrincipalAdress($principalAdress)
    {
        $this->principal_adress = $principalAdress;

        return $this;
    }

    /**
     * Get principal_adress
     *
     * @return string 
     */
    public function getPrincipalAdress()
    {
        return $this->principal_adress;
    }

    /**
     * Set principal_adress2
     *
     * @param string $principalAdress2
     * @return User
     */
    public function setPrincipalAdress2($principalAdress2)
    {
        $this->principal_adress2 = $principalAdress2;

        return $this;
    }

    /**
     * Get principal_adress2
     *
     * @return string 
     */
    public function getPrincipalAdress2()
    {
        return $this->principal_adress2;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return User
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add codes
     *
     * @param \Edp\MainBundle\Entity\code $codes
     * @return User
     */
    public function addCode(\Edp\MainBundle\Entity\code $codes)
    {
        $this->codes[] = $codes;

        return $this;
    }

    /**
     * Remove codes
     *
     * @param \Edp\MainBundle\Entity\code $codes
     */
    public function removeCode(\Edp\MainBundle\Entity\code $codes)
    {
        $this->codes->removeElement($codes);
    }

    /**
     * Get codes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodes()
    {
        return $this->codes;
    }
}
