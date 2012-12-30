<?php

namespace racine\GestionTestsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * racine\GestionTestsBundle\Entity\Reponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="racine\GestionTestsBundle\Entity\ReponseRepository")
 */
class Reponse
{
    
    /**
    * @ORM\ManyToOne(targetEntity="Question",inversedBy="reponses")
    * @ORM\JoinColumn(nullable=false)
    */
   private $question;
    
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean $isCorrect
     *
     * @ORM\Column(name="isCorrect", type="boolean")
     */
    private $isCorrect;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string",length=255)
     */
    
    private $description;
    

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
     * Set isCorrect
     *
     * @param boolean $state
     * @return Reponse
     */
    public function setIsCorrect($state)
    {
        $this->isCorrect = $state;
    
        return $this;
    }

    /**
     * Get isCorrect
     *
     * @return boolean
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }
    
    
    /**
     * Set description
     *
     * @param string $description
     * @return Reponse
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
        return $this->description ;
    
        
    }


    /**
     * Set question
     *
     * @param racine\GestionTestsBundle\Entity\Question $question
     * @return Reponse
     */
    public function setQuestion(\racine\GestionTestsBundle\Entity\Question $question)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return racine\GestionTestsBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}