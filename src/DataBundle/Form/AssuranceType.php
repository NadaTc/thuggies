<?php

namespace DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssuranceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date',DateType::class, array('label'=>'Saisie La date de paiement  : '
            ,'attr'=>array( "class"=>"booking-date"))
)

            ->add('valeur',TextType::class, array('label'=>'Saisie L somme  payé   : '
            ,'attr'=>array( "class"=>"form-control")))




            ->add('assurant',ChoiceType::class

                , array('label'=>'Choisissez votre assurant   : '
            ,'attr'=>array( "class"=>"booking-date"),
                'choices' => array('Amine'=> 'Amine', 'Gat' => 'Gat', 'Kouti_assurant' => 'Kouti_assurant')
            ))


            ->add('idVoiture', EntityType::class


                , array(
                'class' =>'DataBundle\Entity\Voiture' ,
                'choice_label'=>'immatricule'
            ))

            ->add('Effectuer',SubmitType::class, array('label'=>'Effectuer '
            ,'attr'=>array( "class"=>"form-control"))
) ;

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DataBundle\Entity\Assurance'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'databundle_assurance';
    }


}
