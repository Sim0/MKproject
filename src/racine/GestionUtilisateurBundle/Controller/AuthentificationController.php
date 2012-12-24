<?php

namespace racine\GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionUtilisateurBundle\Entity\Utilisateur;
use racine\GestionUtilisateurBundle\Entity\UtilisateurRepository;
use racine\GestionUtilisateurBundle\Form\Type\UtilisateurType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Logout\SessionLogoutHandler;
use Symfony\Component\Security\Http\Logout\CookieClearingLogoutHandler;


class AuthentificationController extends Controller
{
    
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
            return $this->render('racineGestionUtilisateurBundle:Authentification:LoginForm.html.twig', array(// last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
            ));
 
        }
       public function LogoutAction()
               
       {
           /**
           $coockie = new CookieClearingLogoutHandler;
           $coockie->logout(null,null,"how");
           $session = new SessionLogoutHandler();
           
           $session->logout(null, null, "how");
         **/
           /**
           $this->getRequest()->getSession()->invalidate();
           $response = new Response();
           $response->headers->clearCookie("rmbrm");
           
           return $this->render($response);
           **/
          /** $this->getRequest()->getSession()->invalidate();
           return true;
      **/
       }
               
            
        
       
       
        
        
    }
    
    

?>