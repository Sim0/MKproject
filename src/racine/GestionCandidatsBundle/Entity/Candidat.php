<?php

namespace racine\GestionCandidatsBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use racine\GestionUtilisateurBundle\Entity\Groupes;
/**
 * racine\GestionCandidatsBundle\Entity\Candidat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="racine\GestionCandidatsBundle\Entity\CandidatRepository")
 */
class Candidat implements UserInterface , \Serializable
{
    
     /**
     * @ORM\ManyToMany(targetEntity="racine\GestionUtilisateurBundle\Entity\Groupes", inversedBy="candidats")
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
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=30)
     */
    private $nom;

    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=30)
     */
    private $prenom;

    /**
     * @var string $ecole
     *
     * @ORM\Column(name="ecole", type="string", length=30)
     */
    private $ecole;

    /**
     * @var string $filiere
     *
     * @ORM\Column(name="filiere", type="string", length=30)
     */
    private $filiere;

    /**
     * @var string $tel
     *
     * @ORM\Column(name="tel", type="string", length=15)
     */
    private $tel;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var boolean $isValid
     *
     * @ORM\Column(name="isValid", type="boolean")
     */
    private $isValid;

    /**
     * @var integer $resultat
     *
     * @ORM\Column(name="resultat", type="integer")
     */
    private $resultat;
    
    /**
     * @var string $codesession
     *
     * @ORM\Column(name="codesession", type="string", length=50)
     */
    private $codesession;

    
    
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
     * @return Candidat
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
     * @return Candidat
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
     * Set Ecole
     *
     * @param string $ecole
     * @return Candidat
     */
    public function setEcole($ecole)
    {
        $this->ecole = $ecole;
    
        return $this;
    }

    /**
     * Get Ecole
     *
     * @return string 
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * Set Filiere
     *
     * @param string $filiere
     * @return Candidat
     */
    public function setFiliere($filiere)
    {
        $this->filiere = $filiere;
    
        return $this;
    }

    /**
     * Get Filiere
     *
     * @return string 
     */
    public function getFiliere()
    {
        return $this->filiere;
    }

    /**
     * Set Tel
     *
     * @param string $tel
     * @return Candidat
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get Tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set Email
     *
     * @param string $email
     * @return Candidat
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get Email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set IsValid
     *
     * @param boolean $isValid
     * @return Candidat
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
    
        return $this;
    }

    /**
     * Get IsValid
     *
     * @return boolean 
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Set Resultat
     *
     * @param integer $resultat
     * @return Candidat
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;
    
        return $this;
    }

    /**
     * Get Resultat
     *
     * @return integer 
     */
    public function getResultat()
    {
        return $this->resultat;
    }
    
     /**
     * Set codesession
     *
     * @param string $codesession
     * @return Candidat
     */
    public function setCodesession($codesession)
    {
        $this->codesession = $codesession;
    
        return $this;
    }

    /**
     * Get codesession
     *
     * @return string 
     */
    public function getCodesession()
    {
        return $this->codesession;
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
    
   public function getGroupes()
   {
       return $this->groupes;
   }
   
   public function setGroupes($groupes)
   {
       $this->groupes = $groupes;
       return $this;
       
   }
   
   
   
   // on a ajouté ce code 
   
   
     /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        /*
         * ! Don't serialize $roles field !
         */
        return \serialize(array(
            $this->id,
            $this->nom,
            $this->prenom,
            $this->email,
            $this->ecole,
            $this->filiere,
            $this->tel,
            $this->isValid,
            $this->resultat,
            $this->codesession
            
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->nom,
            $this->prenom,
            $this->email,
            $this->ecole,
            $this->filiere,
            $this->tel,
            $this->isValid,
            $this->resultat,
            $this->codesession
        ) = \unserialize($serialized);
    }

    public function getPassword() {
        return $this->codesession;
    }

    public function getSalt() {
        return "";
    }

    public function getUsername() {
        return $this->codesession;
    }

    
}
