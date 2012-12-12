<?php

namespace racine\GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionUtilisateurBundle\Entity\Utilisateur;

class AjouterController extends Controller
{
    public function AjouterAction()
    {
           $user = new Utilisateur;
    // On crée le FormBuilder grâce à la méthode du contrôleur.
       $formBuilder = $this->createFormBuilder($user);

       
    // On ajoute les champs de l'entité que l'on veut à notre formulaire.
         $formBuilder
          ->add('Nom',    'text')
          ->add('Prenom',     'text')
          ->add('Gsm',    'text')   
          ->add('Mail',    'text')  
          ->add('Login',    'text')  
          ->add('Password',    'password') 
          ->add('Grade',    'choice',
                  array('choices' => array('A' => 'Administrateur','U' => 'Utilisateur'), 
                       'required'    => true,
                       'empty_value' => NULL,
                       ));
         
    // À partir du formBuilder, on génère le formulaire.
       $form = $formBuilder->getForm();
       
    // On passe la méthode createView() du formulaire à la vue
    // afin qu'elle puisse afficher le formulaire toute seule.
       
     

        $request = $this->get('request');      // récupérer la requete 


        if( $request->getMethod() == 'POST' )  // si la requet de type POST
        {
        $form->bindRequest($request);
             
        if( $form->isValid() )   // si le formulaire est valide 
        {                        // on insere a la base de donnée 
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($user);
        $em->flush();
        }
           
        }
        
        
        return $this->render('racineGestionUtilisateurBundle:Ajouter:Ajouter.html.twig',array('form' => $form->createView()));
    }
}
