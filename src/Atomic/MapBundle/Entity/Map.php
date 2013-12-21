<?php

namespace Atomic\MapBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Atomic\ServerBundle\Entity\Server;

/**
 * Map
 *
 * @ORM\Table(name="atomic_map")
 * @ORM\Entity(repositoryClass="Atomic\MapBundle\Entity\MapRepository")
 */
class Map {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity="Atomic\ServerBundle\Entity\Server", inversedBy="maps")
     * @ORM\JoinColumn(name="server_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $server;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Map
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

    /**
     * Set link
     *
     * @param string $link
     * @return Map
     */
    public function setLink($link) {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink() {
        return $this->link;
    }

    public function getServer() {
        return $this->server;
    }

    public function setServer($server) {
        $this->server = $server;
    }

}
