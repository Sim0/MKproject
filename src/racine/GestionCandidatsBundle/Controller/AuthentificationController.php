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


class AuthentificationController extends Controller
{
    
    
    public function IndexAction()
    {
        return $this->render('racineGestçionCandidatsBundle:Candidats:EspaceCandidat.html.twig');
    }
    
     public function LoginAction()
    {
            
            $request = $this->getRequest();
            $session = $request->getSession();
           
            // get the login error if there is one
            if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
                
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
            } else 
                {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
            }
            return $this->render('racineGestionCandidatsBundle:Authentification:LoginForm.html.twig', array(// last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME."tkhribi9a"),
            'error' => $error,
            'login' => 'awalo',
            ));
 
        }
       public function LogoutAction()
               
       {
         
       }
               
            
        
       
       
        
        
    }
    
    

?>