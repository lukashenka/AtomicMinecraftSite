<?php

namespace Atomic\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CloackType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('user', 'hidden')
                ->add('file','file', array(
                    'required' => true,
                    'label'=>'Загрузить файл'))

        //  ->add('user')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Atomic\UserBundle\Entity\Cloack'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'atomic_userbundle_cloack';
    }

}
