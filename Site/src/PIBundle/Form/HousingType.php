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
            ->add('location',   TextType::class, array('label' => 'lieu'))
            ->add('rent',   NumberType::class, array('label' => 'loyer'))
            ->add('floor',   IntegerType::class, array('label' => 'étage'))
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
