<?php

namespace Farah\ChatBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DiscussionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('titre_discussion',TextType::class,array('label'=>'Text Discussion  : '
            ,'attr'=>array("class"=>"form-control")))

           ->add('categorie' ,ChoiceType::class, array('label'=>'Type : ',
                'choices'  => array(
                    'Panne Mecanique' => 'Panne Mecanique',
                    'Panne Electrique' => 'Panne Electrique',
                    'Tolier Et Peinture' => 'Tolier Et Peinture',
                    'Changement De Pneu' => 'Changement De Pneu',
                    'Panne Tapissier' => 'Panne Tapissier',
                    'Panne Radiateur' => 'Panne Radiateur',
                    'Mecanique Generale' => 'Mecanique Generale',
                    'Autres' => 'Autres',
                    )
            ,'attr'=>array( "class"=>"form-control")))


            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true, // not mandatory, default is true
                'download_link' => true, // not mandatory, default is true
                "attr"=>array("style"=>"margin-bottom:20px","class"=>"form-cotroler" ),"label"=>false
            ])

            ->add('descriptif',TextareaType::class ,array('label'=>'Descriptif  : '
            ,'attr'=>array( "class"=>"form-control")))


            ->add('Ajout', SubmitType::class,array('label'=>'Ajout   '
            ,'attr'=>array( "class"=>"form-control"))) ;





    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'farah_chat_bundle_discussion_form';
    }
}
