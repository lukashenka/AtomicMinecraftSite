<?php

namespace Atomic\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title',null, array(
                    'attr' => array(
                        'class' => 'form-control',
                       
                    )))
                ->add('blog', 'textarea', array(
                    'attr' => array(
                        'class' => 'tinymce',
                        'data-theme' => 'bbcode' // Skip it if you want to use default theme
                    )
                ))
                ->add('image',null, array(
                    'attr' => array(
                        'class' => 'form-control',
                       
                    )))
          ->add('tags',null, array(
                    'attr' => array(
                        'class' => 'form-control',
                       
                    )))
        //   ->add('created')
        //   ->add('updated')

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Atomic\BlogBundle\Entity\Blog'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'atomic_blogbundle_blog';
    }

}
