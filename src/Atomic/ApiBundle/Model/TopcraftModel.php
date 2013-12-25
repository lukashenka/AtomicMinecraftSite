<?php

namespace Atomic\ApiBundle\Model;


use Symfony\Component\HttpFoundation\Request;


class TopcraftModel {

    private $secretKey;
    private $request;
  

    public function __construct($secretKey,Request $request) {

        $this->secretKey = $secretKey;
        $this->request = $request;
      
    }

    public function isValid() {
        
        
        return ($this->request->get('signature') != sha1($this->request->get('username') . $this->request->get('timestamp') . $this->secretKey));
           
    }

}

?>