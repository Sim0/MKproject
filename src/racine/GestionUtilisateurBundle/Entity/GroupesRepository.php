<?php

namespace racine\GestionUtilisateurBundle\Entity;

use Doctrine\ORM\EntityRepository;


class GroupesRepository extends EntityRepository
{
    public function selectRoles()
    {
        
    
     $q = $this->getEntityManager()->createQuery('Select g.id, g.nom, g.role  from racineGestionUtilisateurBundle:Groupes g ' );
     return $q->getResult();
    }
    
}
