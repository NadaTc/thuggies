<?php

namespace DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('immatricule',TextType::class , array('label'=>'Saisie Le numéro serie de votre voiture   : '
        ,'attr'=>array( "class"=>"form-control")))



            ->add('marque',TextType::class, array('label'=>'Saisie votre Marque  : '
            ,'attr'=>array( "class"=>"form-control")))

            ->add('modele',TextType::class , array('label'=>'Saisie votre modele  : '
            ,'attr'=>array( "class"=>"form-control")))



        ->add('typecarburant',ChoiceType::class , array('label'=>'Saisie Le Type de carburant de votre voiture   : '
        ,'attr'=>array( "class"=>"booking-date"),
            'choices' => array('gasoil'=> 'gasoil', 'essence' => 'essence', 'hyprid' => 'hyprid', 'Gazoil50' => 'Gazoil50'
            , 'Electric' => 'Electric')))



            ->add('nbcheveaux',TextType::class , array('label'=>'Saisie Le nombre de cheveaux de votre voiture   : '
            ,'attr'=>array( "class"=>"form-control")))



            ->add('datemarche',DateType::class , array('label'=>'Saisie La date de mise en circuit  de votre voiture   : '
            ,'attr'=>array( "class"=>"booking-date")))


            ->add('nbrPlace',TextType::class , array('label'=>'Saisie Le nombre de place de votre voiture   : '
            ,'attr'=>array( "class"=>"form-control")))



            ->setMethod('GET')


            ->add('Effectuer',SubmitType::class, array('label'=>'Submit '
            ,'attr'=>array( 'class'=>"btn btn-danger btn-sm"))) ;

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DataBundle\Entity\Voiture'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'databundle_voiture';
    }


}
