<?php

namespace racine\GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionUtilisateurBundle\Entity\Utilisateur;
use racine\GestionUtilisateurBundle\Entity\UtilisateurRepository;
use racine\GestionUtilisateurBundle\Form\Type\UtilisateurType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class addusController extends Controller
{
    
     public function AddAction(request $request)
    {
        if ($request->isXmlHttpRequest()) {
       
            $user = new Utilisateur();
          
            $user->setNom($request->get('nom',''));
            $user->setPrenom($request->get('prenom',''));
            $user->setGsm($request->get('gsm',''));
            $user->setMail($request->get('mail',''));
            $user->setGrade($request->get('grade',''));
            $user->setLogin($request->get('login',''));
            $user->setPassword('aa');
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
        }
            
        
       
        return new response('Success');
        
        
    }
    
    
}
?>