<?php

namespace racine\GestionUtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * racine\GestionUtilisateurBundle\Entity\Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="racine\GestionUtilisateurBundle\Entity\UtilisateurRepository")
 */
class Utilisateur
{
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
     * @ORM\Column(name="Nom", type="string", length=20)
     */
    private $Nom;

    /**
     * @var string $Prenom
     *
     * @ORM\Column(name="Prenom", type="string", length=20)
     */
    private $Prenom;

    /**
     * @var string $Gsm
     *
     * @ORM\Column(name="Gsm", type="string", length=20)
     */
    private $Gsm;

    /**
     * @var string $Mail
     *
     * @ORM\Column(name="Mail", type="string", length=30)
     */
    private $Mail;

    /**
     * @var string $Login
     *
     * @ORM\Column(name="Login", type="string", length=20)
     */
    private $Login;

    /**
     * @var string $Password
     *
     * @ORM\Column(name="Password", type="string", length=20)
     */
    private $Password;

    /**
     * @var string $Grade
     *
     * @ORM\Column(name="Grade", type="string", length=20)
     */
    private $Grade;


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
     * @return Utilisateur
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
     * Set Prenom
     *
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->Prenom = $prenom;
    
        return $this;
    }

    /**
     * Get Prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set Gsm
     *
     * @param string $gsm
     * @return Utilisateur
     */
    public function setGsm($gsm)
    {
        $this->Gsm = $gsm;
    
        return $this;
    }

    /**
     * Get Gsm
     *
     * @return string 
     */
    public function getGsm()
    {
        return $this->Gsm;
    }

    /**
     * Set Mail
     *
     * @param string $mail
     * @return Utilisateur
     */
    public function setMail($mail)
    {
        $this->Mail = $mail;
    
        return $this;
    }

    /**
     * Get Mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->Mail;
    }

    /**
     * Set Login
     *
     * @param string $login
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->Login = $login;
    
        return $this;
    }

    /**
     * Get Login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->Login;
    }

    /**
     * Set Password
     *
     * @param string $password
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->Password = $password;
    
        return $this;
    }

    /**
     * Get Password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set Grade
     *
     * @param string $grade
     * @return Utilisateur
     */
    public function setGrade($grade)
    {
        $this->Grade = $grade;
    
        return $this;
    }

    /**
     * Get Grade
     *
     * @return string 
     */
    public function getGrade()
    {
        return $this->Grade;
    }
}
