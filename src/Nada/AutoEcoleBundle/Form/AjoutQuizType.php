<?php

namespace Nada\AutoEcoleBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AjoutQuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
 $builder

     -> add('test', EntityType::class, array(
         'class' =>'DataBundle\Entity\Test' ,
         'choice_label'=>'niveauTest'
     ))
     ->add('question')
     ->add('alt1')
     ->add('al2')
     ->add('alt3')
     ->add('imageFile', VichImageType::class, [
         'required' => false,])

     ->add('Ajout', SubmitType::class)

 ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DataBundle\Entity\Quiz'
        ));

    }

    public function getBlockPrefix()
    {
        return 'nada_auto_ecole_bundle_ajout_quiz_type';
    }
}
