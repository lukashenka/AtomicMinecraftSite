<?php

namespace Atomic\ServerBundle\Model;

use Atomic\ServerBundle\Entity\Server;
use Atomic\ServerBundle\Model\MinecraftQuery;

class StatusChecker {

    private $timeout;

    /**
     * Prepares the class.
     * @param int    $timeout   default(3)
     */
    public function __construct($timeout = 1) {
        $this->timeout = $timeout;
    }

    /**
     * Gets the status of the target server.
     * @param string    $host    domain or ip address
     * @param int    $port    default(25565)
     */
    public function getStatus(Server $server) {

        $host = $server->getIp();
        $port = $server->getPort();

        $minecraftQuery = new MinecraftQuery();
        $minecraftQuery->Connect($host, $port);

        $res = $minecraftQuery->GetInfo();



        if (!($res)) {

            $res['online'] = false;
        } else {

            $res['online'] = true;
        }



        $res['server_name'] = $server->getName();
        $res['ip'] = $host;
        $res['port'] = $port;
        $res['id'] = $server->getId();

        return $res;
    }

    public function getOnlinePlayersList(Server $server) {
        $minecraftQuery = new MinecraftQuery();
        $minecraftQuery->Connect($server->getIp(), $server->getPort());


        $result = $minecraftQuery->GetPlayers();
    
        return $result;
    }

}

?>
