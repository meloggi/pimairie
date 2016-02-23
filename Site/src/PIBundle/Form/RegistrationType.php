<?php
    namespace PIBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    
    class RegistrationType extends AbstractType
        {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
          //  $builder->add('name');
              $builder
              ->add('firstname')
              ->add('lastname')
              ->add('salary')
            ->remove('username');
        }

    
        public function getBlockPrefix()
        {
            return 'app_user_registration';
        }
        public function getParent()
        {
            return 'FOS\UserBundle\Form\Type\RegistrationFormType';
        }
    }