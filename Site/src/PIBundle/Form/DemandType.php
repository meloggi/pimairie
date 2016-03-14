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
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('salary')
            ->add('locationVillersCentre')
            ->add('locationVillersBas')
            ->add('locationClairlieu')
            ->add('type1')
            ->add('type2')
           ->add('comment', TextType::class, array('required' => false, 'empty_data'  => 'Rien'))
            
            ->add('note', TextType::class, array('required' => false, 'empty_data'  => 'Rien'))
            ->add('date')
            ->add('telephone')
            ->add('numero')
            ->add('voie')
            ->add('complementadresse')
            ->add('lieudit')
            ->add('codepostal')
            ->add('commune')
            ->add('personnecharge')
            ->add('nombrepersonnecharge')
            ->add('profession')
            ->add('nomemployeur')
            ->add('codepostalemployeur')
            ->add('communeemployeur')
            ->add('avisimposition')
            ->add('salary')
            ->add('allocationchomage')
            ->add('retraite')
            ->add('pensionalimentaire')
            ->add('pensioninvalidite')
            ->add('allocationfamilial')
            ->add('rsa')
            ->add('bourseetudiant')
            ->add('autres')
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
