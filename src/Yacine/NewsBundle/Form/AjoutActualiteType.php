<?php

namespace Yacine\NewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class AjoutActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('titreActualite')
            ->add('contenuActualite')
            ->add('descriptif')
            ->add('categorie')
       ->add('imageFile', VichFileType::class)
           ->add('Ajout',SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'yacine_news_bundle_ajout_actualite_type';
    }
}
