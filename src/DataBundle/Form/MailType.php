<?php

namespace DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class, array('attr' => array('placeholder' => 'Votre Nom',"class"=>"form-control")
            ))
            ->add('subject', TextType::class, array('attr' => array('placeholder' => 'Sujet ',"class"=>"form-control")))

            ->add('email' ,ChoiceType::class, array('label'=>'Type : ',
                'choices'  => array(
                    'farahbenmoahmed02@gmail.com' => 'farahbenmoahmed02@gmail.com',),'attr' => array('placeholder' => 'email ',"class"=>"form-control")))

            ->add('message', TextareaType::class, array('attr' => array('placeholder' => 'Votre mesage',"class"=>"form-control")
            ))
        ;


    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'data_bundle_mail_type';
    }
}
