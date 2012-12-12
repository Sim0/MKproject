<?php

namespace racine\GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionUtilisateurBundle\Entity\Utilisateur;

class AjouterController extends Controller
{
    public function AjouterAction()
    {
        
        $user = new Utilisateur;
        
        $formBuilder = $this->createFormBuilder($user);
        
        $formBuilder
          ->add('Nom','text')
          ->add('Prenom','text')
          ->add('Gsm','text')   
          ->add('Mail','text')  
          ->add('Login','text')  
          ->add('Password','password') 
          ->add('Grade','choice', array('choices' => array('Admin' => 'Administrateur','User' => 'Utilisateur'),'required'=> true,'empty_value' => NULL ));
                                                                                       
         $form = $formBuilder->getForm();
         
         $request = $this->get('request');      
        
         
         
        if( $request->getMethod() == 'POST' )  // si la requet de type POST
        {
        $form->bindRequest($request);
 
        if( $form->isValid() )   // si le formulaire est valide 
        {                        // on insere a la base de donnée 
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($user);
        $em->flush();
        return $this->render('racineGestionUtilisateurBundle:Ajouter:AjouterSucces.html.twig',array('user'=>$user));
        }
       
        }

         return $this->render('racineGestionUtilisateurBundle:Ajouter:Ajouter.html.twig',array('form' => $form->createView()));
    }
}