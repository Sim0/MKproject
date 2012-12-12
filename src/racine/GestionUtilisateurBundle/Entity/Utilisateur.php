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
     */
    public function setNom($nom)
    {
        $this->Nom = $nom;
    
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
     */
    public function setPrenom($prenom)
    {
        $this->Prenom = $prenom;
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
     */
    public function setGsm($gsm)
    {
        $this->Gsm = $gsm;
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
     */
    public function setMail($mail)
    {
        $this->Mail = $mail;
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
     */
    public function setLogin($login)
    {
        $this->Login = $login;
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
     */
    public function setPassword($password)
    {
        $this->Password = $password;
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
     */
    public function setGrade($grade)
    {
        $this->Grade = $grade;
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
