<?php

namespace Atomic\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
        //    ->add('email')
        //    ->add('emailCanonical')
        //    ->add('enabled')
        //    ->add('salt')
        //    ->add('password')
        //    ->add('lastLogin')
        //    ->add('locked')
        //    ->add('confirmationToken')
        //    ->add('passwordRequestedAt')
        //    ->add('roles')
        //    ->add('coins')
        //    ->add('groups')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Atomic\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'atomic_userbundle_user';
    }
}
