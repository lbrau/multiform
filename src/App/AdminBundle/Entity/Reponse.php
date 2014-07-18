<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\AdminBundle\Entity\ReponseRepository")
 */
class Reponse
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
    * @var string
    *
    * @ORM\Column(name="Contenu", type="text")
    */
   private $contenu;
    
    
   /**
   * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\HermesUser", inversedBy="reponses", cascade={"persist"})
   */
    private $usersHermes;
    
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
    * Set contenu
    *
    * @param string $contenu
    * @return Reponse
    */
   public function setContenu($contenu)
   {
       $this->contenu = $contenu;

       return $this;
   }

   /**
    * Get contenu
    *
    * @return string 
    */
   public function getContenu()
   {
       return $this->contenu;
   }
   /**
    * Constructor
    */
   public function __construct()
   {
       $this->usersErmes = new \Doctrine\Common\Collections\ArrayCollection();
   }

    /**
     * Add usersHermes
     *
     * @param \App\AdminBundle\Entity\HermesUser $usersHermes
     * @return Reponse
     */
    public function addUsersHerme(\App\AdminBundle\Entity\HermesUser $usersHermes)
    {
        $this->usersHermes[] = $usersHermes;

        return $this;
    }

    /**
     * Remove usersHermes
     *
     * @param \App\AdminBundle\Entity\HermesUser $usersHermes
     */
    public function removeUsersHerme(\App\AdminBundle\Entity\HermesUser $usersHermes)
    {
        $this->usersHermes->removeElement($usersHermes);
    }

    /**
     * Get usersHermes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsersHermes()
    {
        return $this->usersHermes;
    }
    
    public function __toString() {
       
       return 'N°'.$this->id.' | '.$this->contenu;
    }

    /**
     * Set usersHermes
     *
     * @param \App\AdminBundle\Entity\HermesUser $usersHermes
     * @return Reponse
     */
    public function setUsersHermes(\App\AdminBundle\Entity\HermesUser $usersHermes = null)
    {
        $this->usersHermes = $usersHermes;

        return $this;
    }
}
