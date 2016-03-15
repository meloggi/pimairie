<?php

namespace PIBundle\Form;

use PIBundle\Entity\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    /**
   * @var Employee
   */
  protected $loggedInUser;

  /**
   * Constructor.
   *
   * @param Employee $loggedInUser
   */
  public function __construct(Employee $loggedInUser) {
    $this->loggedInUser = $loggedInUser;
  }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            >add('firstName', 'text')
      ->add('lastName', 'text')
      ->add('email', 'text')
      ->add(
        'rolesCollection', 'entity',
        [
          'class' => 'PIBundle\Entity\Role',
          'property' => 'name',
          'multiple' => TRUE,
          'expanded' => TRUE,
          'label' => 'Roles',
          'disabled' => !$this->loggedInUser->isAdmin(),
        ]
      )
      ->add(
        'salary', 'money',
        [
          'required' => FALSE,
          'currency' => 'EUR',
          'disabled' => !$this->loggedInUser->isAdmin(),
        ]
      )
      ->add(
        'activeFrom', 'date',
        [
          'input' => 'datetime',
          'widget' => 'choice',
          'disabled' => !$this->loggedInUser->isAdmin(),
        ]
      )
      ->add(
        'activeTo', 'date',
        [
          'required' => FALSE,
          'input' => 'datetime',
          'widget' => 'choice',
          'placeholder' => '',
          'disabled' => !$this->loggedInUser->isAdmin(),
        ]
      )
      ->add('save', 'submit', ['label' => 'Save employee']);
        ;
    }
    
    /**
   * Returns the name of this type.
   *
   * @return string The name of this type
   */
  public function getName() {
    return 'app_employee';
  }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PIBundle\Entity\Employee'
        ));
    }
}
