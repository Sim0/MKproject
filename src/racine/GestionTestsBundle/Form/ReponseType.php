<?php

namespace racine\GestionTestsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Reponse_correcte')
            ->add('Reponse_possible')
            ->add('question',null,array('required'=>false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'racine\GestionTestsBundle\Entity\Reponse'
        ));
    }

    public function getName()
    {
        return 'racine_gestiontestsbundle_reponsetype';
    }
}
