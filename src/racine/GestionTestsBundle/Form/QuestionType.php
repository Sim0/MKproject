<?php

namespace racine\GestionTestsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Theme')
            ->add('Type')
            ->add('Text')
            ->add('tests',null,array('required'=>false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'racine\GestionTestsBundle\Entity\Question'
        ));
    }

    public function getName()
    {
        return 'racine_gestiontestsbundle_questiontype';
    }
}
