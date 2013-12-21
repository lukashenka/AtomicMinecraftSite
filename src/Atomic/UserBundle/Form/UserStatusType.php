<?php

namespace Atomic\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserStatusType extends AbstractType {

    private $userStatuses;
    
     public function __construct(array $userStatuses)
    {
        $this->userStatuses = $userStatuses;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->userStatuses,
        ));
    }

    public function getParent() {
        return 'choice';
    }

    public function getName() {
        return 'user_statuses';
    }

}