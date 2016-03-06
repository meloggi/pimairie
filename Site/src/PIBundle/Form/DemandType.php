<?php

namespace PIBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DatetimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class DemandType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('salary')
            ->add('locationVillersCentre')
            ->add('locationVillersBas')
            ->add('locationClairlieu')
            ->add('type1')
            ->add('type2')
            ->add('comment', TextType::class, array('required' => false, 'empty_data'  => 'Rien'))
            ->add('note', TextType::class, array('required' => false, 'empty_data'  => 'Rien'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PIBundle\Entity\Demand'
        ));
    }
}
