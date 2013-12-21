<?php

namespace Atomic\ApiBundle\Controller;

use Atomic\ApiBundle\Model\TopcraftModel;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TopcraftController extends Controller {

    public function voteAction(Request $request) {

        $secretCode = $this->container->getParameter('topcraft_secret_key');
        
        $em = $this->getDoctrine()->getManager();
        $logger = $this->get('logger');
        
        $topCraft = new TopcraftModel($secretCode, $request);
        
        if(!$topCraft->isValid())
        {
             $logger->error("Hash with {$request->get('username')} not valid");
             die();
        }
        
        
        $user = $em->getRepository("AtomicUserBundle:User")->findOneByUsername($request->get('username'));
        
        if(!is_object($user))
        {
            $logger->error("User with username {$request->get('username')} not found");
            die();
            
        }
        
        $bonusCoinsTopcraft = (int)$this->container->getParameter('bonus_coins_topcraft');
        
        $logger->info("Setting new coins for {$request->get('username')} + {$bonusCoinsTopcraft}");
        
        $user->setCoins($user->getCoins()+$bonusCoinsTopcraft);
        $em->persist($user);
        $em->flush();
        
        
        
        return null;
        
 
    }


}

