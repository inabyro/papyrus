<?php

namespace Edp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tva
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Edp\MainBundle\Entity\tvaRepository")
 */
class tva
{
    
    /**
     * @ORM\OneToMany(targetEntity="Edp\MainBundle\Entity\facture",mappedBy="tva")
     */
    private $factures;
    
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
     * @var float
     *
     * @ORM\Column(name="coeff", type="float")
     */
    private $coeff;


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
     * Set libelle
     *
     * @param string $libelle
     * @return tva
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

    /**
     * Set coeff
     *
     * @param float $coeff
     * @return tva
     */
    public function setCoeff($coeff)
    {
        $this->coeff = $coeff;

        return $this;
    }

    /**
     * Get coeff
     *
     * @return float 
     */
    public function getCoeff()
    {
        return $this->coeff;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->factures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add factures
     *
     * @param \Edp\MainBundle\Entity\facture $factures
     * @return tva
     */
    public function addFacture(\Edp\MainBundle\Entity\facture $factures)
    {
        $this->factures[] = $factures;

        return $this;
    }

    /**
     * Remove factures
     *
     * @param \Edp\MainBundle\Entity\facture $factures
     */
    public function removeFacture(\Edp\MainBundle\Entity\facture $factures)
    {
        $this->factures->removeElement($factures);
    }

    /**
     * Get factures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFactures()
    {
        return $this->factures;
    }
}
