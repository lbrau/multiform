<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\AdminBundle\Entity\QuestionRepository")
 */
class Question
{
   /**
    * @var integer
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   private $id;
    
    
   /**
   * @ORM\OneToOne(targetEntity="App\AdminBundle\Entity\Reponse")
   */
    private $reponse;
    
   /**
   * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Langue", mappedBy="question")
   */
    private $langue;

   /**
    * @var string
    *
    * @ORM\Column(name="Libelle", type="string", length=255)
    */
   private $libelle;

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
    * @return Question
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
     * Constructor
     */
    public function __construct()
    {
        $this->langue = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set reponse
     *
     * @param \App\AdminBundle\Entity\Reponse $reponse
     * @return Question
     */
    public function setReponse(\App\AdminBundle\Entity\Reponse $reponse = null)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return \App\AdminBundle\Entity\Reponse 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Add langue
     *
     * @param \App\AdminBundle\Entity\Langue $langue
     * @return Question
     */
    public function addLangue(\App\AdminBundle\Entity\Langue $langue)
    {
        $this->langue[] = $langue;

        return $this;
    }

    /**
     * Remove langue
     *
     * @param \App\AdminBundle\Entity\Langue $langue
     */
    public function removeLangue(\App\AdminBundle\Entity\Langue $langue)
    {
        $this->langue->removeElement($langue);
    }

    /**
     * Get langue
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLangue()
    {
        return $this->langue;
    }
}
