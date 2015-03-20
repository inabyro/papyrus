<?php

namespace Edp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * facture
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Edp\MainBundle\Entity\factureRepository")
 */
class facture
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Edp\MainBundle\Entity\tva")
     */
    private $tva;
    
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
     * @ORM\Column(name="num", type="string", length=255)
     */
    private $num;

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
     * Set num
     *
     * @param string $num
     * @return facture
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return string 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return facture
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
     * Set tva
     *
     * @param \Edp\MainBundle\Entity\tva $tva
     * @return facture
     */
    public function setTva(\Edp\MainBundle\Entity\tva $tva = null)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return \Edp\MainBundle\Entity\tva 
     */
    public function getTva()
    {
        return $this->tva;
    }
}
