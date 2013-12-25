<?php

namespace Atomic\ServerBundle\Controller;
use FOS\RestBundle\Controller\FOSRestController;

class RestServiceController extends FOSRestController {

    public function indexAction() {
        
    }

    public function getServersStatusAction() {
        $em = $this->getDoctrine()->getManager();
        $servers = $em->getRepository('AtomicServerBundle:Server')->findAll();

        $serversStatus = array();

        foreach ($servers as $server) {

            $serverStatus = new StatusChecker();

            $status = $serverStatus->getStatus($server);
            $serversStatus[] = $status;
        }
    }

}
