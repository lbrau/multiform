<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\AdminBundle\Entity\QuestionTypeRepository")
 */
class QuestionType
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
   * @ORM\ManyToMany(targetEntity="App\AdminBundle\Entity\Langue", inversedBy="questionstype")
   * @ORM\JoinTable(name="questiontype_langue")
   */
    private $langues;

   /**
    * @var string
    *
    * @ORM\Column(name="Libelle", type="string", length=255)
    */
   private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer")
     */
    private $value;

    public function __construct() {
        $this->langues = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $langues
     */
    public function setLangues($langues)
    {
        $this->langues = $langues;
    }

    /**
     * @return mixed
     */
    public function getLangues()
    {
        return $this->langues;
    }

}
