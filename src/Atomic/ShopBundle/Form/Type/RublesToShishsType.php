<?php

namespace Atomic\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RublesToShishsType extends AbstractType {

    private $server;

    public function setServer($serverName) {
        $this->server = $serverName;
    }

    public function getServer() {
        return $this->server;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
 
        $builder->add('server', 'hidden', array('data' => $this->server))
                ->add('shishs', 'integer', array(
                    'label' => 'Купить шишы', 'max_length' => 15))

        ;
    }

    public function getName() {
        return 'exchanger';
    }

}