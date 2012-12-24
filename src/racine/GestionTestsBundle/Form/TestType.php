<?php

namespace racine\GestionTestsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Duree')
            ->add('Nbr_questions')
            ->add('Duree_max_question')
            ->add('Description')
            ->add('questions',null,array('required'=>false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'racine\GestionTestsBundle\Entity\Test'
        ));
    }

    public function getName()
    {
        return 'racine_gestiontestsbundle_testtype';
    }
}
