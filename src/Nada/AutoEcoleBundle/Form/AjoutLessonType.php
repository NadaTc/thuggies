<?php

namespace Nada\AutoEcoleBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AjoutLessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            -> add('cours', EntityType::class, array(
                'class' =>'DataBundle\Entity\CoursCode' ,
                'choice_label'=>'titreCours'
            ))
            ->add('name')
            ->add('text')

            ->add('imageFile', VichImageType::class, [
                'required' => false,])
            ->add('Ajout',SubmitType::class)




        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DataBundle\Entity\Lesson'
        ));
    }

    public function getBlockPrefix()
    {
        return 'nada_auto_ecole_bundle_ajout_lesson_type';
    }
}
