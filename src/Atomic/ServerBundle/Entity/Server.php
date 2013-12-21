<?php

namespace Atomic\ServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * Server
 *
 * @ORM\Table(name="atomic_servers")
 * @ORM\Entity(repositoryClass="Atomic\ServerBundle\Entity\ServerRepository")
 */
class Server {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Atomic\MapBundle\Entity\Map", inversedBy="maps")
     * @ORM\JoinColumn(name="map_id", referencedColumnName="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=16)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="port", type="integer", length=5)
     */
    private $port;

    /**
     * @ORM\OneToMany(targetEntity="Atomic\MapBundle\Entity\Map", mappedBy="Server", cascade={"all"})
     */
    private $maps;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $info;

    public function __construct() {
        $this->maps = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Server
     */
    public function setIp($ip) {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp() {
        return $this->ip;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Server
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    public function getPort() {
        return $this->port;
    }

    public function setPort($port) {
        $this->port = $port;
    }

    public function getMaps() {
        return $this->maps;
    }

    public function setMaps(\Atomic\MapBundle\Entity\Map $maps) {

        $this->maps = $maps;
    }
    
    public function addMap(\Atomic\MapBundle\Entity\Map $map)
    {
        $this->maps[]=$map;
    }
    
    public function removeMap(\Atomic\MapBundle\Entity\Map $map)
    {
        $this->maps->removeElement($map);
    }
    
    public function getInfo()
    {
        return $this->info;
    }
    
    public function setInfo($info)
    {
        $this->info = $info;
    }

}
