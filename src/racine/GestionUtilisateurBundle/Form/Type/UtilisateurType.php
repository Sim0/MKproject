<?php

namespace racine\GestionUtilisateurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class UtilisateurType extends AbstractType{
    
    
    function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder->add('Nom','text')
          ->add('Prenom','text')
          ->add('Gsm','text')   
          ->add('Mail','text')  
          ->add('Login','text')  
          ->add('Password','password') 
          ->add('Grade','choice', array('choices' => array('Admin' => 'Administrateur','User' => 'Utilisateur'),'required'=> true,'empty_value' => NULL ));
    }
   
    
    function getName(){
        return 'Userform';
}
}


?>
