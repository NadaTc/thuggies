<?php

namespace Wissem\CondidatBundle\Form;


use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AjoutDemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder




        ->add('nom')

        ->add('prenom',TextType::class)
        ->add('cin', IntegerType::class)
        ->add('rectoCin', IntegerType::class)
        ->add('dateNaisance')

        ->add('numPasseport', IntegerType::class)
        ->add('nationalite',TextType::class)
        ->add('adresse',TextType::class)
        ->add('etat')
        ->add('Ajouter',SubmitType::class) ;



    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'wissem_condidat_bundle_ajout_demande_type';
    }
}
