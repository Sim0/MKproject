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
     * @var string $Reponse_correcte
     *
     * @ORM\Column(name="Reponse_correcte", type="string", length=255)
     */
    private $Reponse_correcte;

    /**
     * @var string $Reponse_possible
     *
     * @ORM\Column(name="Reponse_possible", type="text" )
     */
    private $Reponse_possible;


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
     * Set Reponse_correcte
     *
     * @param string $reponseCorrecte
     * @return Reponse
     */
    public function setReponseCorrecte($reponseCorrecte)
    {
        $this->Reponse_correcte = $reponseCorrecte;
    
        return $this;
    }

    /**
     * Get Reponse_correcte
     *
     * @return string 
     */
    public function getReponseCorrecte()
    {
        return $this->Reponse_correcte;
    }

    /**
     * Set Reponse_possible
     *
     * @param string $reponsePossible
     * @return Reponse
     */
    public function setReponsePossible($reponsePossible)
    {
        $this->Reponse_possible = $reponsePossible;
    
        return $this;
    }

    /**
     * Get Reponse_possible
     *
     * @return string 
     */
    public function getReponsePossible()
    {
        return $this->Reponse_possible;
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