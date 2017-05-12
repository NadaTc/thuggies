<?php

namespace Farah\ChatBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('text_comdis',TextareaType::class,array('label'=>'Text comdis  : '
            ,'attr'=>array( "class"=>"form-control"),"disabled"=>true))

            ->setMethod('GET')
            ->add('Ajouter', SubmitType::class) ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'farah_chat_bundle_commentaire_form';
    }
}
