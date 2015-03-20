<?php

namespace Edp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * code
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Edp\MainBundle\Entity\codeRepository")
 */
class code
{
    
     /**
     *
     * @ORM\ManyToMany(targetEntity="Edp\MainBundle\Entity\abonnement",mappedBy="codes",cascade={"persist"}) 
     */
    private $abonnements;
    
    /**
     * @ORM\ManyToMany(targetEntity="Edp\UserBundle\Entity\User",inversedBy="codes")
     */
    private $utilisateurs;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Edp\MainBundle\Entity\article",mappedBy="codes") 
     */
    private $articles;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Edp\MainBundle\Entity\image",mappedBy="codes") 
     */
    private $images;
    

    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;


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
     * Set titre
     *
     * @param string $titre
     * @return code
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return code
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return code
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return (string) $this->code;
    }

    /**
     * Set abonnements
     *
     * @param \Edp\MainBundle\Entity\abonnement $abonnements
     * @return code
     */
    public function setAbonnements(\Edp\MainBundle\Entity\abonnement $abonnements = null)
    {
        $this->abonnements = $abonnements;

        return $this;
    }

    /**
     * Get abonnements
     *
     * @return \Edp\MainBundle\Entity\abonnement 
     */
    public function getAbonnements()
    {
        return $this->abonnements;
    }

    /**
     * Add articles
     *
     * @param \Edp\MainBundle\Entity\article $articles
     * @return code
     */
    public function addArticle(\Edp\MainBundle\Entity\article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param \Edp\MainBundle\Entity\article $articles
     */
    public function removeArticle(\Edp\MainBundle\Entity\article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Add images
     *
     * @param \Edp\MainBundle\Entity\image $images
     * @return code
     */
    public function addImage(\Edp\MainBundle\Entity\image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Edp\MainBundle\Entity\image $images
     */
    public function removeImage(\Edp\MainBundle\Entity\image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set utilisateurs
     *
     * @param \Edp\UserBundle\Entity\User $utilisateurs
     * @return code
     */
    public function setUtilisateurs(\Edp\UserBundle\Entity\User $utilisateurs = null)
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * Get utilisateurs
     *
     * @return \Edp\UserBundle\Entity\User 
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Add utilisateurs
     *
     * @param \Edp\UserBundle\Entity\User $utilisateurs
     * @return code
     */
    public function addUtilisateur(\Edp\UserBundle\Entity\User $utilisateurs)
    {
        $this->utilisateurs[] = $utilisateurs;

        return $this;
    }

    /**
     * Remove utilisateurs
     *
     * @param \Edp\UserBundle\Entity\User $utilisateurs
     */
    public function removeUtilisateur(\Edp\UserBundle\Entity\User $utilisateurs)
    {
        $this->utilisateurs->removeElement($utilisateurs);
    }

    /**
     * Add abonnements
     *
     * @param \Edp\MainBundle\Entity\abonnement $abonnements
     * @return code
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
}
