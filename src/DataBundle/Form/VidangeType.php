<?php

namespace DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VidangeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('kilometrage',TextType::class, array('label'=>'Saisie Le KM   : '
            ,'attr'=>array( "class"=>"form-control")))

            ->add('lieu',TextType::class, array('label'=>'Donner le lieu   : '
            ,'attr'=>array( "class"=>"form-control")))

            ->add('dateVidange',DateType::class, array('label'=>'Saisie La date de Vidange  : '
            ,'attr'=>array( "class"=>"booking-date")))

            ->add('idVoiture', EntityType::class, array(
                'class' =>'DataBundle\Entity\Voiture' ,
                'choice_label'=>'immatricule'
            ))


            ->add('Effectuer',SubmitType::class, array('label'=>'OK '
            ,'attr'=>array( "class"=>"form-control"))) ;

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DataBundle\Entity\Vidange'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'databundle_vidange';
    }


}
