<?php

namespace racine\GestionUtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * racine\GestionUtilisateurBundle\Entity\Groupes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="racine\GestionUtilisateurBundle\Entity\GroupesRepository")
 * 
 */

class Groupes implements RoleInterface , \Serializable
{
     /**
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="groupes")
     */
    private $utilisateurs;
     
    /**
     * @ORM\ManyToMany(targetEntity="racine\GestionCandidatsBundle\Entity\Candidat", mappedBy="groupes")
     */
    private $candidats;
    
    
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
     * @ORM\Column(name="nom", type="string", length=32)
     */
    private $nom;
    
    /**
     * @ORM\Column(name="role", type="string", length=20, unique=true)
     */
    private $role;
    

   public function __construct()
   {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->candidats = new \Doctrine\Common\Collections\ArrayCollection();
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
        return $this->nom;
    }

    
    public function setRole($role) {
        $this->role = $role;
        return $this;
    }
    
    public function getRole() {
        return $this->role;
        
    }
    
    
    
    public function getUtilisateurs() {
      
        return $this->utilisateurs->toArray();
    }

    
    // on a ajouté ce code 
    
    
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        /*
         * ! Don't serialize $users field !
         */
        return \serialize(array(
            $this->id,
            $this->nom,
            $this->role
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->nom,
            $this->role
        ) = \unserialize($serialized);
    }
    
    
    
}
