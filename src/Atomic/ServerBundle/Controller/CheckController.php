<?php

namespace Atomic\ServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Atomic\ServerBundle\Model\StatusChecker;
use Atomic\UserBundle\Entity\User;

class CheckController extends Controller {

    public function checkAction() {

        $em = $this->getDoctrine()->getManager();
        $servers = $em->getRepository('AtomicServerBundle:Server')->findAll();

        $serversStatus = array();

        foreach ($servers as $server) {

            $serverStatus = new StatusChecker();

            $status = $serverStatus->getStatus($server);
            $serversStatus[] = $status;
        }



        return $this->render('AtomicServerBundle:Check:servercheck.html.twig', array('statuses' => $serversStatus));
    }

    public function onlinePlayersAction($id) {

        $em = $this->getDoctrine()->getManager();
        $server = $em->getRepository('AtomicServerBundle:Server')->findOneById($id);



        $serverStatus = new StatusChecker();
        $onlinePlayers = $serverStatus->getOnlinePlayersList($server);


        $users = $em->getRepository('AtomicUserBundle:User')->getByUsernames($onlinePlayers);

        return $this->render('AtomicServerBundle:Check:online-players.html.twig', array('players' => $users,
                    'server' => $server,
                        )
        );
    }

}
