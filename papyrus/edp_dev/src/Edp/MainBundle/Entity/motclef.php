<?php

namespace Edp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * motclef
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Edp\MainBundle\Entity\motclefRepository")
 */
class motclef
{
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Edp\MainBundle\Entity\article",inversedBy="motclefs",cascade={"persist"})
     * @ORM\JoinTable(name="motclef_article") 
     */
    private $articles;
    
       
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
     * @ORM\Column(name="motclef", type="string", length=255)
     */
    private $motclef;

    /**
     * @var string
     *
     * @ORM\Column(name="article_ref", type="string", length=255)
     */
    private $articleRef;


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
     * Set motclef
     *
     * @param string $motclef
     * @return motclef
     */
    public function setMotclef($motclef)
    {
        $this->motclef = $motclef;

        return $this;
    }

    /**
     * Get motclef
     *
     * @return string 
     */
    public function getMotclef()
    {
        return $this->motclef;
    }

    /**
     * Set articleRef
     *
     * @param string $articleRef
     * @return motclef
     */
    public function setArticleRef($articleRef)
    {
        $this->articleRef = $articleRef;

        return $this;
    }

    /**
     * Get articleRef
     *
     * @return string 
     */
    public function getArticleRef()
    {
        return $this->articleRef;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add articles
     *
     * @param \Edp\MainBundle\Entity\article $articles
     * @return motclef
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
}
