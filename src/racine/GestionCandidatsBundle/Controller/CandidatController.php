<?php

namespace racine\GestionCandidatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionCandidatsBundle\Entity\Candidat;
use racine\Candidat\Entity\CandidatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Logout\SessionLogoutHandler;
use Symfony\Component\Security\Http\Logout\CookieClearingLogoutHandler;


class CandidatController extends Controller
{
    
    
    public function IndexAction()
    {
        return $this->render('racineGestionCandidatsBundle:Candidats:EspaceCandidat.html.twig');
    }
    
    public function InscriptionAction(request $request)
    {
       
        if ($request->isXmlHttpRequest()) {
            
            $candidat = new Candidat();
          
            $candidat->setNom($request->get('nom'));
            $candidat->setPrenom($request->get('prenom'));
            $candidat->setTel($request->get('tel'));
            $candidat->setEmail($request->get('email'));
            $candidat->setEcole($request->get('ecole'));
            $candidat->setFiliere($request->get('filiere'));
            
            $length = 2;

            $randomString = \substr(\str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

            
            $random = $randomString.\mt_rand(100000,999999 );
            
            $candidat->setCodesession($random);
            $candidat->setIsValid(false);
            $candidat->setResultat(0);
            
           
            
            $em = $this->getDoctrine()->getManager();
         
             // récupérer l'object groupe dont le role est ROLE_CANDIDAT
            $group = $em->find('racineGestionUtilisateurBundle:Groupes', 3);
            
            $candidat->getGroupes($group)->add($group);
           
            $em->persist($candidat);
            $em->flush();
            
             //Vérifier si la valeur idrole est bien assignée!!
            $codeCandidat = $candidat->getCodesession(); 
            
            
             $content = array("status"=>"200","info"=>$codeCandidat,"group"=>$group->getNom());
             $content = \json_encode($content);
        
             $resp = new Response();
             $resp->setStatusCode(200);
             $resp->setContent($content);
       
            
        
       
        return $resp;
            
            
        }
        
      
        
        
        return $this->render('racineGestionCandidatsBundle:Candidats:InscriptionCandidat.html.twig');
    }
    
    
               
            
        
       
       
        
        
    }
    
    

?>