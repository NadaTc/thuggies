<?php

namespace DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReparerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('typePanne',ChoiceType::class, array('label'=>'Saisie Le Type votre panne    : '
            ,'attr'=>array( "class"=>"booking-date"),
                'choices' => array('Mecanique'=> 'Mecanique', 'carcasse' => 'carcasse', 'electricie' => 'electricie')
            ))


            ->add('pieceChangee',TextType::class, array('label'=>'Saisie La piece changé   : '
            ,'attr'=>array( "class"=>"form-control")))


            ->add('description',TextareaType::class, array('label'=>'Donner une description de votre panne  : '
            ,'attr'=>array( "class"=>"form-control")))


            ->add('date',DateType::class, array('label'=>'Saisie La date de mise en circuit  de votre voiture   : '
            ,'attr'=>array( "class"=>"booking-date")))



            ->add('idVoiture', EntityType::class
                , array(
                'class' =>'DataBundle\Entity\Voiture' ,
                'choice_label'=>'immatricule'
            ))


            ->add('Effectuer',SubmitType::class, array('label'=>'Effectuer'
            ,'attr'=>array( "class"=>"btn btn-danger btn-sml"))) ;

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DataBundle\Entity\Reparer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'databundle_reparer';
    }


}
