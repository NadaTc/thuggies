<?php

namespace DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureRechForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
 $builder ->add('immatricule')
          ->add('valider' ,SubmitType::class);


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'Databundle_voiture_rech_form';
    }
}
