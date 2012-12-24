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
    * @ORM\OneToMany(targetEntity="Reponse", mappedBy="Question")
    */
    private $reponses;
    
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Test", inversedBy="questions")
     *
     */
    private $tests;
    
    
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $Theme
     *
     * @ORM\Column(name="Theme", type="string", length=50)
     */
    private $Theme;

    /**
     * @var string $Type
     *
     * @ORM\Column(name="Type", type="string", length=50)
     */
    private $Type;

    /**
     * @var string $Text
     *
     * @ORM\Column(name="Text", type="string", length=255)
     */
    private $Text;

    
    
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
     * @param string $theme
     * @return Question
     */
    public function setTheme($theme)
    {
        $this->Theme = $theme;
    
        return $this;
    }

    /**
     * Get Theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->Theme;
    }

    /**
     * Set Type
     *
     * @param string $type
     * @return Question
     */
    public function setType($type)
    {
        $this->Type = $type;
    
        return $this;
    }

    /**
     * Get Type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Set Text
     *
     * @param string $text
     * @return Question
     */
    public function setText($text)
    {
        $this->Text = $text;
    
        return $this;
    }

    /**
     * Get Text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->Text;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reponses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add tests
     *
     * @param racine\GestionTestsBundle\Entity\Test $tests
     * @return Question
     */
    public function addTest(\racine\GestionTestsBundle\Entity\Test $tests)
    {
        $this->tests[] = $tests;
    
        return $this;
    }

    /**
     * Remove tests
     *
     * @param racine\GestionTestsBundle\Entity\Test $tests
     */
    public function removeTest(\racine\GestionTestsBundle\Entity\Test $tests)
    {
        $this->tests->removeElement($tests);
    }

    /**
     * Get tests
     *
     * @return Doctrine\Common\Collections\ArrayCollection 
     */
    public function getTests()
    {
        return $this->tests;
    }
}