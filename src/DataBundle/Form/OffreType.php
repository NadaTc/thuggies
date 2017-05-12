<?php

namespace DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',TextType::class, array('label'=>'Titre de votre anonce  : '
        ,'attr'=>array( "class"=>"form-control")))


            ->add('marque',TextType::class, array('label'=>'Saisie La marque    : '
            ,'attr'=>array( "class"=>"form-control")))

            ->add('modele',TextType::class, array('label'=>'Saisie Le modele de votre voiture   : '
            ,'attr'=>array( "class"=>"form-control")))




            ->add('prix',TextType::class, array('label'=>'Saisie prix demander   : '
            ,'attr'=>array( "class"=>"form-control")))
            ->add('descriptif',TextareaType::class, array('label'=>'Donnez une description  : '
            ,'attr'=>array( "class"=>"form-control")))
            ->add('location',TextType::class, array('label'=>'Votre Localisation : '
            ,'attr'=>array( "class"=>"form-control")))
            ->add('numeroDeTel',TextType::class, array('label'=>'Saisie Votre numéro de téléphone  : '
            ,'attr'=>array( "class"=>"form-control")))
            ->add('imageFile', VichImageType::class,[
                'required' => false,
                'allow_delete' => true, // not mandatory, default is true
                'download_link' => true, // not mandatory, default is true
            ] , array('label'=>'Image de votre voiture  : '
            ,'attr'=>array( "class"=>"form-control")) )




        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DataBundle\Entity\Offre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'databundle_offre';
    }


}
