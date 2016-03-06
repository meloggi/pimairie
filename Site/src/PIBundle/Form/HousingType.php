<?php

namespace PIBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HousingType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location',   TextType::class, array('label' => 'Localisation: '))
            ->add('bailleur',   TextType::class, array('label' => 'Bailleur: '))
            ->add('adress',   TextType::class, array('label' => 'Adresse: '))
            ->add('residence',   TextType::class, array('label' => 'Résidence: ', 'required' => false, 'empty_data'  => 0))
            ->add('type',   TextType::class, array('label' => 'Type: '))
            ->add('rent',   NumberType::class, array('label' => 'Loyer: '))
            ->add('floor',   IntegerType::class, array('label' => 'Etage: '))
            ->add('numero',   IntegerType::class, array('label' => 'Numéro: '))
            ->add('contingent',   TextType::class, array('label' => 'Contingent: '))
            ->add('Valider',      SubmitType::class)
        ;
    }
   
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PIBundle\Entity\Housing'
        ));
    }

    public function getName()
  {
    return 'form1';
  }

}
