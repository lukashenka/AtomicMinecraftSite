<?php

namespace Atomic\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Atomic\UserBundle\Model\ImageUpload;

/**
 * Skin
 *
 * @ORM\Table(name="atomic_skin")
 * @ORM\Entity(repositoryClass="Atomic\UserBundle\Entity\SkinRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Skin extends ImageUpload {

    public function __construct() {
       
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Atomic\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",unique=true, referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;


    /**
     * @var string
     *
     * @ORM\Column(name="isometric_skin_path", type="string", length=255)
     */
    private $isometricSkin;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \stdClass $user
     * @return Skin
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \stdClass 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Skin
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Set uploaded
     *
     * @param \DateTime $uploaded
     * @return Skin
     */
    public function setUploaded($uploaded) {
        $this->uploaded = $uploaded;

        return $this;
    }

    /**
     * Get uploaded
     *
     * @return \DateTime 
     */
    public function getUploaded() {
        return $this->uploaded;
    }

    public function getImage() {
        return $this->getUploadDir() . $this->getPath();
    }

    public function upload() {
        $this->setUploadDir($this->getUploadDir());
        $path = $this->user->getUserName() . ".png";
        $this->file->move($this->getUploadRootDir(), $path);

        return $this->getUploadDir() . $path;
    }

    public function getRootFilePath() {
        return $this->getUploadRootDir() . $this->user->getUsername() . ".png";
    }
    
    public function getUploadDir() {
        return "players-data/skins/";
    }
    
    public function isSkinSetted()
    {
        return file_exists($this->getRootFilePath());
    }
    
    public function setIsometricSkin($path)
    {
        $this->isometricSkin = $path;
    }
    
    public function getIsometricSkin()
    {
        return$this->isometricSkin;
    }

}
