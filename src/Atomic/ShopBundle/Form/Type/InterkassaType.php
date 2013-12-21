<?php

namespace Atomic\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InterkassaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        //$builder->setAction("http://www.interkassa.com/lib/payment.php");
        $builder->add('ik_shop_id', 'hidden')
                ->add('ik_payment_amount', 'integer', array(
                    'label' => 'Количество рублей', 'max_length' => 15))
                ->add('ik_payment_id', 'hidden')
                ->add('ik_payment_desc', 'hidden')
        ;
    }

    public function getName() {
        return 'interkassa';
    }

}