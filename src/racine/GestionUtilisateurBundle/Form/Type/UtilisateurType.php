<?php

namespace racine\GestionUtilisateurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class UtilisateurType extends AbstractType{
    
    
    function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder->add('Nom','text')
          ->add('Prenom','text')
          ->add('Tel','text')   
          ->add('Email','text')  
          ->add('Username','text')  
          ->add('Password','password');
    }
   
    
    function getName(){
        return 'Userform';
}
}


?>
