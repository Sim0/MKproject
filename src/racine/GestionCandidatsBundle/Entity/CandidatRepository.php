<?php

namespace racine\GestionCandidatsBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CandidatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CandidatRepository extends EntityRepository
{
    
    public function selectCandidats($isValid = true){
        
        
      $q = $this->getEntityManager()->createQuery('Select c.id,c.codesession, c.prenom, c.nom, c.ecole, c.filiere,c.email,c.tel,c.resultat  from racineGestionCandidatsBundle:Candidat c where c.isValid = ?1 ' )->setParameter(1, $isValid);
      
       return $q->getResult();
        
    }
}
