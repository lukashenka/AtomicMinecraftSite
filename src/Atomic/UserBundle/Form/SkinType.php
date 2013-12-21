<?php

namespace Atomic\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SkinType extends AbstractType {

    
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
              
                ->add('user','hidden')
                ->add('file')
               
        //  ->add('user')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Atomic\UserBundle\Entity\Skin'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'atomic_userbundle_skin';
    }
    
    

}
