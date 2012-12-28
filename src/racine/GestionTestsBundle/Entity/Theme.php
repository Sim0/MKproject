<?php

namespace racine\GestionTestsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * racine\GestionTestsBundle\Entity\Theme
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="racine\GestionTestsBundle\Entity\ThemeRepository")
 */
class Theme
{
   
    /**
    * @ORM\OneToMany(targetEntity="Question",mappedBy="theme")
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string",length=40)
     */
    private $title;
    
    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string",length=255)
     */
    private $description;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        
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
     * Set title
     *
     * @param string $title
     * @return Theme
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set description
     *
     * @param string $description
     * @return Theme
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Add questions
     *
     * @param racine\GestionTestsBundle\Entity\question $questions
     * @return Question
     */
    public function addQuestions(\racine\GestionTestsBundle\Entity\Reponse $questions)
    {
        $this->questions[] = $questions;
    
        return $this;
    }

    /**
     * Remove questions
     *
     * @param racine\GestionTestsBundle\Entity\Reponse $reponses
     */
    public function removeQuestions(\racine\GestionTestsBundle\Entity\Reponse $questions)
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
