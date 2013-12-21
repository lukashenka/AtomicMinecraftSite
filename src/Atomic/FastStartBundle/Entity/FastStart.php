<?php

namespace Atomic\FastStartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FastStart
 *
 * @ORM\Table("atomic_faststart")
 * @ORM\Entity(repositoryClass="Atomic\FastStartBundle\Entity\FastStartRepository")
 */
class FastStart
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="step", type="integer")
     */
    private $step;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set step
     *
     * @param integer $step
     * @return FastStart
     */
    public function setStep($step)
    {
        $this->step = $step;
    
        return $this;
    }

    /**
     * Get step
     *
     * @return integer 
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return FastStart
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
}
