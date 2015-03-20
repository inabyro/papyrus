<?php

namespace Edp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * abonnement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Edp\MainBundle\Entity\abonnementRepository")
 */
class abonnement
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Edp\UserBundle\Entity\User",inversedBy="abonnements")
     */
    private $utilisateurs;
    
    /**
     * @ORM\ManyToMany(targetEntity="Edp\MainBundle\Entity\code",inversedBy="abonnements",cascade={"persist"})
     * @ORM\JoinTable(name="code_abonnement")
     */
    private $codes;
    
    
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut", type="datetime")
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="datetime")
     */
    private $fin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


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
     * Set debut
     *
     * @param \DateTime $debut
     * @return abonnement
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime 
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     * @return abonnement
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime 
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return abonnement
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    /**
     * Constructor
     */
    public function __construct($utilisateurs)
    {
        $this->codes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->utilisateurs = $utilisateurs;
        $this->isActive=0;
    }
    
    public function __toString() {
        return (string) $this->abonnement;
    }

    /**
     * Set utilisateurs
     *
     * @param \Edp\UserBundle\Entity\User $utilisateurs
     * @return abonnement
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
     * Add codes
     *
     * @param \Edp\MainBundle\Entity\code $codes
     * @return abonnement
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

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return abonnement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}
