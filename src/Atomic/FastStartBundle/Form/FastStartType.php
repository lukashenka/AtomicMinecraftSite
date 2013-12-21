<?php

namespace Atomic\FastStartBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FastStartType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('step', null, array(
                    'attr' => array(
                        'class' => 'form-control',
            )))
                ->add('content', 'textarea', array(
                    'attr' => array(
                        'class' => 'tinymce',
                        'data-theme' => 'bbcode' // Skip it if you want to use default theme
                    )
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Atomic\FastStartBundle\Entity\FastStart'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'atomic_faststartbundle_faststart';
    }

}
