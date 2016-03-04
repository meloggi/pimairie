<?php

namespace PIBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchHousingType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location',    TextType::class, array('label' => 'Localisation: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('bailleur',   TextType::class, array('label' => 'Bailleur: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('adress',   TextType::class, array('label' => 'Adresse: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('residence',   TextType::class, array('label' => 'Résidence: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('type',   TextType::class, array('label' => 'Type: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('rentmin',   IntegerType::class, array('label' => 'Loyer minimum: ', 'required' => false, 'empty_data'  => '0'))
            ->add('rentmax',   IntegerType::class, array('label' => 'Loyer maximum: ', 'required' => false, 'empty_data'  => '100000'))
            ->add('floor',   TextType::class, array('label' => 'Etage: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('numero',   TextType::class, array('label' => 'Numéro: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('contingent',   TextType::class, array('label' => 'Contingent: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('attribution',   TextType::class, array('label' => 'Attribution: ', 'required' => false, 'empty_data'  => 'Tous'))
            ->add('Rechercher',      SubmitType::class)
        ;
    }
   
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PIBundle\Entity\SearchHousing'
        ));
    }

    public function getName()
  {
    return 'searchform1';
  }

}
