<?php

namespace Atomic\ShopBundle\Model;

use Atomic\ShopBundle\Model\Interkassa;
use Symfony\Component\HttpFoundation\Request;

class InterkassaResponse extends Interkassa {

    private $ik_paysystem_alias;
    private $ik_baggage_fields;
    private $ik_payment_state;
    private $ik_trans_id;
    private $ik_currency_exch;
    private $ik_fees_payer;
    private $ik_key;
    private $ik_sign_hash;
    

    public function __construct(Request $request, $secret_key) {


        $this->ik_key = $secret_key;
        $this->ik_shop_id = $request->get('ik_shop_id');
        $this->ik_payment_amount = $request->get('ik_payment_amount');
        $this->ik_payment_id = $request->get('ik_payment_id');
        $this->ik_paysystem_alias = $request->get('ik_paysystem_alias');
        $this->ik_baggage_fields = $request->get('ik_baggage_fields');
        $this->ik_payment_state = $request->get('ik_payment_state');
        $this->ik_trans_id = $request->get('ik_trans_id');
        $this->ik_currency_exch = $request->get('ik_currency_exch');
        $this->ik_fees_payer = $request->get('ik_fees_payer');
        $this->secret_key = $request->get('secret_key');
        $this->ik_sign_hash = $request->get('ik_sign_hash');
    }

    
    public function getSingHashStr()
    {
           $sing_hash_str = $this->ik_shop_id . ':' . $this->ik_payment_amount . ':' . $this->ik_payment_id . ':' .
                $this->ik_paysystem_alias . ':' . $this->ik_baggage_fields . ':' .
                $this->ik_payment_state . ':' . $this->ik_trans_id . ':' .
                $this->ik_currency_exch . ':' . $this->ik_fees_payer . ':' .
                $this->ik_key;
        return $sing_hash_str;
    }

    public function getMd5Hash() {
     

        $sign_hash = strtoupper(md5($this->getSingHashStr()));
        return $sign_hash;
    }

    public function isValid() {


        if ($this->ik_sign_hash === $this->getMd5Hash()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getIkTransId()
    {
        return $this->ik_trans_id;
    }

}

?>
