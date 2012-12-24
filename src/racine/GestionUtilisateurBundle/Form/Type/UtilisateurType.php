<?php

namespace racine\GestionUtilisateurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class UtilisateurType extends AbstractType{
    
    
    function buildForm(FormBuilderInterface $builder, array $options) {
        
        parent::buildForm($builder, $options);
       
        $builder->add('Nom','text',array('label' => 'Nom :',
            'attr'=>array('class'=>'input-text medium a',
            'name'=>'addNom')))
          ->add('Prenom','text',array('label' => 'Prenom :',
            'attr'=>array('class'=>'input-text medium a',
            'name'=>'addPrenom')))
          ->add('Tel','text',array('label' => 'Tel :',
            'attr'=>array('class'=>'input-text medium a',
            'name'=>'addTel')))   
          ->add('Email','text',array('label' => 'Email :',
            'attr'=>array('class'=>'input-text medium a',
            'name'=>'addEmail')))  
          ->add('Username','text',array('label' => 'Username :',
            'attr'=>array('class'=>'input-text medium a',
            'name'=>'addPseudo')))
          ->add('Password','password',array('label' => 'Password :',
            'attr'=>array('class'=>'input-text medium a',
            'name'=>'addPassword')));
    }
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class'=>'racine\GestionUtilisateurBundle\Entity\Utilisateur',
        );
    }
    
    function getName(){
        return 'Userform';
}
}


?>
