<?php

namespace Atomic\ApiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PermissionsController extends Controller {

    public function deleteExpiredAction() {

       
        $em = $this->getDoctrine()->getManager();
        
        $oldStatuses = $em->getRepository('AtomicUserBundle:PermissionsInheritance')->getExpiredStatuses();
        
        $logger = $this->get('logger');
        
        foreach ($oldStatuses as $status){
        
            $logger->info("Remove user {$status->getChild()} what expired at {$status->getExpired()->format('Y-m-d H:i:s')}");
            $em->remove($status);
        
        }
        $em->flush();
        die();
        return null;
        
 
    }


}

