<?php
    namespace PIBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    
    class RegistrationType extends AbstractType
        {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
              $builder
              ->add('firstname')
              ->add('lastname')
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