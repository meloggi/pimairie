<?php

namespace PIBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeDemandeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date')
            ->add('telephone')
            ->add('mail')
            ->add('numero')
            ->add('voie')
            ->add('complementadresse')
            ->add('lieudit')
            ->add('codepostal')
            ->add('commune')
            ->add('personnecharge')
            ->add('nombrepersonnecharge')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PIBundle\Entity\DemandeDemande'
        ));
    }
}
