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
     * @ORM\ManyToMany(targetEntity="Question", inversedBy="tests")
     *
     */
    private $questions;
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $Nom
     *
     * @ORM\Column(name="Nom", type="string", length=50)
     */
    private $Nom;

    /**
     * @var integer $Duree
     *
     * @ORM\Column(name="Duree", type="integer")
     */
    private $Duree;

    /**
     * @var integer $Nbr_questions
     *
     * @ORM\Column(name="Nbr_questions", type="integer")
     */
    private $Nbr_questions;

    /**
     * @var integer $Duree_max_question
     *
     * @ORM\Column(name="Duree_max_question", type="integer")
     */
    private $Duree_max_question;

    /**
     * @var string $Description
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $Description;

    
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
        $this->Nom = $nom;
    
        return $this;
    }

    /**
     * Get Nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * Set Duree
     *
     * @param integer $duree
     * @return Test
     */
    public function setDuree($duree)
    {
        $this->Duree = $duree;
    
        return $this;
    }

    /**
     * Get Duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->Duree;
    }

    /**
     * Set Nbr_questions
     *
     * @param integer $nbrQuestions
     * @return Test
     */
    public function setNbrQuestions($nbrQuestions)
    {
        $this->Nbr_questions = $nbrQuestions;
    
        return $this;
    }

    /**
     * Get Nbr_questions
     *
     * @return integer 
     */
    public function getNbrQuestions()
    {
        return $this->Nbr_questions;
    }

    /**
     * Set Duree_max_question
     *
     * @param integer $dureeMaxQuestion
     * @return Test
     */
    public function setDureeMaxQuestion($dureeMaxQuestion)
    {
        $this->Duree_max_question = $dureeMaxQuestion;
    
        return $this;
    }

    /**
     * Get Duree_max_question
     *
     * @return integer 
     */
    public function getDureeMaxQuestion()
    {
        return $this->Duree_max_question;
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return Test
     */
    public function setDescription($description)
    {
        $this->Description = $description;
    
        return $this;
    }

    /**
     * Get Description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->Description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add questions
     *
     * @param racine\GestionTestsBundle\Entity\Test $questions
     * @return Test
     */
    public function addQuestion(\racine\GestionTestsBundle\Entity\Test $questions)
    {
        $this->questions[] = $questions;
    
        return $this;
    }

    /**
     * Remove questions
     *
     * @param racine\GestionTestsBundle\Entity\Test $questions
     */
    public function removeQuestion(\racine\GestionTestsBundle\Entity\Test $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return Doctrine\Common\Collections\ArrayCollection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}