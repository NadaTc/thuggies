<?php

namespace Nada\AutoEcoleBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifQuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('question')
            ->add('alt1')
            ->add('al2')
            ->add('alt3')


            ->add('Modification', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {



    }

    public function getBlockPrefix()
    {
        return 'nada_auto_ecole_bundle_modif_quiz_type';
    }
}
