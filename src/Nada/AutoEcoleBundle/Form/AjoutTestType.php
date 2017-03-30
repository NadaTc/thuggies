<?php

namespace Nada\AutoEcoleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  $builder

        ->add('niveauTest')
        ->add('Ajout', SubmitType::class) ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'nada_auto_ecole_bundle_ajout_test_type';
    }
}
