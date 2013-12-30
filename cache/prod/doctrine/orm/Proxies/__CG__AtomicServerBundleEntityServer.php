<?php

namespace Proxies\__CG__\Atomic\ServerBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Server extends \Atomic\ServerBundle\Entity\Server implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setIp($ip)
    {
        $this->__load();
        return parent::setIp($ip);
    }

    public function getIp()
    {
        $this->__load();
        return parent::getIp();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function getPort()
    {
        $this->__load();
        return parent::getPort();
    }

    public function setPort($port)
    {
        $this->__load();
        return parent::setPort($port);
    }

    public function getMaps()
    {
        $this->__load();
        return parent::getMaps();
    }

    public function setMaps(\Atomic\MapBundle\Entity\Map $maps)
    {
        $this->__load();
        return parent::setMaps($maps);
    }

    public function addMap(\Atomic\MapBundle\Entity\Map $map)
    {
        $this->__load();
        return parent::addMap($map);
    }

    public function removeMap(\Atomic\MapBundle\Entity\Map $map)
    {
        $this->__load();
        return parent::removeMap($map);
    }

    public function getInfo()
    {
        $this->__load();
        return parent::getInfo();
    }

    public function setInfo($info)
    {
        $this->__load();
        return parent::setInfo($info);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'ip', 'name', 'port', 'info', 'maps');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}