<?php

namespace Atomic\UserBundle\Form;

use Atomic\UserBundle\Form\UserStatusType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PermissionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('permissions', 'user_statuses', array(
                    'required' => true,
                    'label'=>'Сменить статус',
                    'empty_value' => 'Выберите новый статус',
                    'empty_data' => null));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'permissions' => 'Atomic\UserBundle\Model\Permission'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'permissions_form';
    }

}
