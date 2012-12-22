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

class Groupes implements RoleInterface
{
     /**
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="groupes")
     */
    private $utilisateurs;
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
        $this->utilisateurs = new ArrayCollection();
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

    
}
