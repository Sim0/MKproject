<?php

namespace racine\GestionUtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use \Symfony\Component\Security\Core\User\UserInterface;
/**
 * racine\GestionUtilisateurBundle\Entity\Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="racine\GestionUtilisateurBundle\Entity\UtilisateurRepository")
 * @UniqueEntity(fields="tel",message="tel deja utilisé")
 * @UniqueEntity(fields="email",message="email deja utilisé")
 * @UniqueEntity(fields="username",message="username deja utilisé")
 */
class Utilisateur implements UserInterface
{
     /**
     * @ORM\ManyToMany(targetEntity="Groupes", inversedBy="utilisateurs")
     *
     */
    private $groupes;
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=20)
     * @Assert\NotBlank()
     */
    private $username;
    
    /**
     * @var string $Nom
     *
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;

    /**
     * @var string $Prenom
     *
     * @ORM\Column(name="prenom", type="string", length=20)
     */
    private $prenom;

    /**
     * @var string $tel
     *
     * @ORM\Column(name="tel", type="string", length=20)
     */
    private $tel;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=30)
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=20)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;
   
   
    public function __construct()
    {
         $this->groupes = new ArrayCollection();
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
     * @return Utilisateur
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
     * Set Prenom
     *
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get Prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Utilisateur
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set Mail
     *
     * @param string $mail
     * @return Utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Utilisateur
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get Password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function eraseCredentials() {
        
    }
    /**
     * 
     * @inheritDoc
     */

    public function getRoles() {
        
        return $this->groupes->toArray();
        
    }
    
    public function setSalt($salt){
        $this->salt = $salt;
        return $salt;
    }
    
    public function getSalt() {
        return $this->salt;
    }
    
    
   public function getGroupes()
   {
       return $this->groupes;
   }
   
   public function setGroupes($groupes)
   {
       $this->groupes = $groupes;
       return $this;
       
   }
    
}
