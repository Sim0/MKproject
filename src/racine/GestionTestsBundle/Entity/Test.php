<?php

namespace racine\GestionTestsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * racine\GestionTestsBundle\Entity\Test
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="racine\GestionTestsBundle\Entity\TestRepository")
 */
class Test
{
     /**
    * @ORM\OneToMany(targetEntity="Creneau", mappedBy="test")
    */
    private $creneaux;
   
    /**
    * @ORM\ManyToOne(targetEntity="racine\GestionUtilisateurBundle\Entity\Utilisateur", inversedBy="tests" )
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
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var integer $duree
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var integer $nbr_questions
     *
     * @ORM\Column(name="nbr_questions", type="integer")
     */
    private $nbr_questions;

    /**
     * @var integer $duree_max_question
     *
     * @ORM\Column(name="duree_max_question", type="integer")
     */
    private $duree_max_question;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var string $isPublished
     *
     * @ORM\Column(name="isPublished", type="boolean")
     */
    private $isPublished;
    

    
    public function __toString() 
    {
        return $this->getNom();
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
     * Set Nom
     *
     * @param string $nom
     * @return Test
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get Nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set Duree
     *
     * @param integer $duree
     * @return Test
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    
        return $this;
    }

    /**
     * Get Duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set Nbr_questions
     *
     * @param integer $nbrQuestions
     * @return Test
     */
    public function setNbrQuestions($nbrQuestions)
    {
        $this->nbr_questions = $nbrQuestions;
    
        return $this;
    }

    /**
     * Get Nbr_questions
     *
     * @return integer 
     */
    public function getNbrQuestions()
    {
        return $this->nbr_questions;
    }

    /**
     * Set Duree_max_question
     *
     * @param integer $dureeMaxQuestion
     * @return Test
     */
    public function setDureeMaxQuestion($dureeMaxQuestion)
    {
        $this->duree_max_question = $dureeMaxQuestion;
    
        return $this;
    }

    /**
     * Get Duree_max_question
     *
     * @return integer 
     */
    public function getDureeMaxQuestion()
    {
        return $this->duree_max_question;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Test
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
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add creneaux
     *
     * @param racine\GestionTestsBundle\Entity\Creneau $creneau
     * @return Test
     */
    public function addCreneaux(\racine\GestionTestsBundle\Entity\Reponse $creneau)
    {
        $this->creneaux[] = $creneau;
    
        return $this;
    }

    /**
     * Remove creneaux
     *
     * @param racine\GestionTestsBundle\Entity\Creneau $creneau
     */
    public function removeCreneaux(\racine\GestionTestsBundle\Entity\Reponse $creneau)
    {
        $this->creneaux->removeElement($creneau);
    }

    /**
     * Get creneaux
     *
     * @return Doctrine\Common\Collections\ArrayCollection 
     */
    public function getCreneaux()
    {
        return $this->creneaux;
    }
    
    /**
     * Set Utilisateur
     *
     * @param  $utilisateur
     * @return Test
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
    
    /**
     * Set IsPublished
     *
     * @param boolean $state
     * @return Test
     */
    public function setIsPublished($state)
    {
        $this->isPublished = $state;
    
        return $this;
    }

    /**
     * Get IsPublished
     *
     * @return boolean
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }
    
}