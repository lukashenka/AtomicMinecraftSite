<?php

namespace Atomic\UserBundle\Model;

use Atomic\UserBundle\Entity\User;

class MinecraftCloack {

    private $uploadDir;
    private $image;
    private $user;
    private $partyDir;
    private $partyImageName = "party-cloack.png";

    public function __construct($image, User $user, $uploadDir) {
        $this->user = $user;
        $this->image = $image;
        $this->uploadDir = $uploadDir;

        //Folder for temporary save party images ex. players-data/cloacks/AtomicMan/partyImage.png
        $this->partyDir = $this->uploadDir . $this->user->getUsername();
    }

    public function setUploadDir($uploadDir) {
        $this->uploadDir = $uploadDir;
    }

    public function savePartyCloack() {

        if (!is_dir($this->partyDir)) {
            mkdir($this->partyDir, 0777);
        }

        $original = imagecreatefrompng($this->image);
      
        $dest = imagecreatetruecolor(22, 17);

        imagecopy($dest, $original, 0, 0, 0, 0, 22, 17);
        imagepng($dest, $this->partyDir . "/" . $this->partyImageName);
        imagedestroy($original);
        imagedestroy($dest);
    }

}

?>
