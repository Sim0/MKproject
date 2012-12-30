<?php

namespace racine\GestionTestsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * racine\GestionTestsBundle\Entity\Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="racine\GestionTestsBundle\Entity\QuestionRepository")
 */
class Question
{
 
   /**
    * @ORM\OneToMany(targetEntity="Reponse", mappedBy="question")
    * cascade={"persist"}
    *
    */
    private $reponses;
    
    /**
    * @ORM\ManyToOne(targetEntity="Theme",inversedBy="questions")
    * @ORM\JoinColumn(nullable=false)
    */
    private $theme;
    
    
   /**
    * @ORM\ManyToOne(targetEntity="racine\GestionUtilisateurBundle\Entity\Utilisateur",inversedBy="questions")
    * @ORM\JoinColumn(nullable=false)
    */
    private $utilisateur;
    
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    

    /**
     * @var string $Description
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    
    
    
    
    
    
    public function __toString() 
    {
        return $this->getText();
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
     * Set Theme
     *
     * @param racine\GestionTestsBundle\Entity\Theme $theme
     * @return Question
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    
        return $this;
    }

    /**
     * Get Theme
     *
     * @return racine\GestionTestsBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->theme;
    }

   

    /**
     * Set Description
     *
     * @param string $description
     * @return Question
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get Description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reponses = new \Doctrine\Common\Collections\ArrayCollection();
        
    }
    
    /**
     * Add reponses
     *
     * @param racine\GestionTestsBundle\Entity\Reponse $reponses
     * @return Question
     */
    public function addReponse(\racine\GestionTestsBundle\Entity\Reponse $reponses)
    {
        $this->reponses[] = $reponses;
    
        return $this;
    }

    /**
     * Remove reponses
     *
     * @param racine\GestionTestsBundle\Entity\Reponse $reponses
     */
    public function removeReponse(\racine\GestionTestsBundle\Entity\Reponse $reponses)
    {
        $this->reponses->removeElement($reponses);
    }

    /**
     * Get reponses
     *
     * @return Doctrine\Common\Collections\ArrayCollection 
     */
    public function getReponses()
    {
        return $this->reponses;
    }
    
    /**
     * Set Utilisateur
     *
     * @param  $utilisateur
     * @return Question
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
    
        return $this;
    }

    /**
     * Get Utilisateur
     *
     * @return racine\GestionUtilisateursBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }


}