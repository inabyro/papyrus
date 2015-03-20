<?php

namespace Edp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Edp\MainBundle\Entity\articleRepository")
 */
class article
{
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Edp\MainBundle\Entity\code",inversedBy="articles") 
     */
    private $codes;
    
        
    /**
     *
     * @ORM\ManyToMany(targetEntity="Edp\MainBundle\Entity\image",mappedBy="articles") 
     */
    private $images;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Edp\MainBundle\Entity\motclef",mappedBy="articles",cascade={"persist"}) 
     */
    private $motclefs;
    
    
    
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
     * @ORM\Column(name="nor", type="string", length=255)
     */
    private $nor;

    /**
     * @var text
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * @return article
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
     * Set nor
     *
     * @param string $nor
     * @return article
     */
    public function setNor($nor)
    {
        $this->nor = $nor;

        return $this;
    }

    /**
     * Get nor
     *
     * @return string 
     */
    public function getNor()
    {
        return $this->nor;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return article
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->motclefs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Set codes
     *
     * @param \Edp\MainBundle\Entity\code $codes
     * @return article
     */
    public function setCodes(\Edp\MainBundle\Entity\code $codes = null)
    {
        $this->codes = $codes;

        return $this;
    }

    /**
     * Get codes
     *
     * @return \Edp\MainBundle\Entity\code 
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * Add motclefs
     *
     * @param \Edp\MainBundle\Entity\motclef $motclefs
     * @return article
     */
    public function addMotclef(\Edp\MainBundle\Entity\motclef $motclefs)
    {
        $this->motclefs[] = $motclefs;

        return $this;
    }

    /**
     * Remove motclefs
     *
     * @param \Edp\MainBundle\Entity\motclef $motclefs
     */
    public function removeMotclef(\Edp\MainBundle\Entity\motclef $motclefs)
    {
        $this->motclefs->removeElement($motclefs);
    }

    /**
     * Get motclefs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMotclefs()
    {
        return $this->motclefs;
    }

    /**
     * Add images
     *
     * @param \Edp\MainBundle\Entity\image $images
     * @return article
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
}
