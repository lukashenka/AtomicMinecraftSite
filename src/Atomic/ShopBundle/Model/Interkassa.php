<?php

namespace Atomic\ShopBundle\Model;

use Atomic\UserBundle\Entity\User;
use Atomic\ShopBundle\Entity\Transaction;
use Doctrine\ORM\EntityManager;


class Interkassa {

    protected $ik_shop_id;
    protected $ik_payment_amount;
    protected $ik_payment_id;
    protected $ik_payment_desc;
    protected $secret_key;
    
    
    
    public function __construct(User $user,$ik_shop_id = null) {
        $this->ik_payment_desc = "Покупка игровых денег пользователем  " . $user->getUsername();
        $this->ik_shop_id =$ik_shop_id;
       
    }

    public function getIkShopId() {
        return $this->ik_shop_id;
    }

    public function getIkPaymentAmount() {
        return $this->ik_payment_amount;
    }

    public function getIkPaymentId() {
        return $this->ik_payment_id;
    }

    public function getIkPaymentDesc() {
        return $this->ik_payment_desc;
    }

}

?>
