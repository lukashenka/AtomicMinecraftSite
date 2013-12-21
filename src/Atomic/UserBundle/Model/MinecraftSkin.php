<?php

namespace Atomic\UserBundle\Model;

use Atomic\UserBundle\Entity\User;

class MinecraftSkin {

    private $uploadDir;
    private $image;
    private $user;
    private $partyDir;

    public function __construct($image, User $user, $uploadDir) {
        $this->user = $user;
        $this->image = $image;
        $this->uploadDir = $uploadDir;
        $this->partyDir = $this->uploadDir . $this->user->getUsername();
    }

    public function setUploadDir($uploadDir) {
        $this->uploadDir = $uploadDir;
    }

    function minecraft_skin_3d_part($original, $xpos, $ypos, $width, $height, $texturesize, $name, $flipx, $flipy) {
        $temp = imagecreatetruecolor($texturesize, $texturesize);
        $trans = imagecolorallocatealpha($temp, 255, 255, 255, 127);
        $x = $xpos;
        $y = $ypos;
        $w = $width;
        $h = $height;
        imagealphablending($temp, false);
        imagesavealpha($temp, true);
        if ($flipx == TRUE && $flipy == TRUE) {
            $xpos = $xpos + $width - 1;
            $width = 0 - $width;
            $ypos = $ypos + $height - 1;
            $height = 0 - $height;
        } else if ($flipx == TRUE) {
            $xpos = $xpos + $width - 1;
            $width = 0 - $width;
        } else if ($flipy == TRUE) {
            $ypos = $ypos + $height - 1;
            $height = 0 - $height;
        }
        //Copy Part To New 'Canvas'
        imagecopyresampled($temp, $original, 0, 0, $xpos, $ypos, $texturesize, $texturesize, $width, $height);
        //Make One-Color Hats Transparent
        $match = imagecolorat($original, $x, $y);
        $transparent = true;
        if (substr($name, 0, 3) == "hat") {
            for ($x2 = $x; $x2 < ($x + $w); $x2++) {
                for ($y2 = $y; $y2 < ($y + $h); $y2++) {
                    if (imagecolorat($original, $x2, $y2) != $match) {
                        $transparent = false;
                        break 2;
                    }
                }
            }
        }
        if ($transparent == true && substr($name, 0, 3) == "hat") {
            imagefilledrectangle($temp, 0, 0, $texturesize, $texturesize, $trans);
        }


        //Save Image
        imagepng($temp,$this->partyDir."/". $name . ".png");
       
        
        imagedestroy($temp);
    }

    function minecraft_skin_to_part() {
        


           
            if (!is_dir($this->partyDir)) {
                mkdir($this->partyDir, 0777);
            }




            //Create another image twice the size
            $original = imagecreatefrompng($this->image);

            /////////////////////////
            // Body Parts (for 3D) //
            /////////////////////////

            $this->minecraft_skin_3d_part($original, 40, 0, 8, 8, 256, "hat_top", TRUE, TRUE);
            $this->minecraft_skin_3d_part($original, 48, 0, 8, 8, 256, "hat_bottom", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  32, 8, 8, 8, 256, "hat_left", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  40, 8, 8, 8, 256, "hat_front", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original, 48, 8, 8, 8, 256, "hat_right", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  56, 8, 8, 8, 256, "hat_back", FALSE, FALSE);

            $this->minecraft_skin_3d_part($original,  8, 0, 8, 8, 256, "head_top", TRUE, TRUE);
            $this->minecraft_skin_3d_part($original,  16, 0, 8, 8, 256, "head_bottom", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  0, 8, 8, 8, 256, "head_left", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  8, 8, 8, 8, 256, "head_front", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  16, 8, 8, 8, 256, "head_right", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  24, 8, 8, 8, 256, "head_back", FALSE, FALSE);

            $this->minecraft_skin_3d_part($original,  20, 16, 8, 4, 256, "body_top", TRUE, TRUE);
            $this->minecraft_skin_3d_part($original,  28, 16, 8, 4, 256, "body_bottom", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  28, 20, 4, 12, 256, "body_right", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  20, 20, 8, 12, 256, "body_front", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  16, 20, 4, 12, 256, "body_left", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  32, 20, 8, 12, 256, "body_back", FALSE, FALSE);

            $this->minecraft_skin_3d_part($original,  44, 16, 4, 4, 256, "arm_left_top", TRUE, TRUE);
            $this->minecraft_skin_3d_part($original,  48, 16, 4, 4, 256, "arm_left_bottom", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  40, 20, 4, 12, 256, "arm_left_outer", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  44, 20, 4, 12, 256, "arm_left_front", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  48, 20, 4, 12, 256, "arm_left_inner", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  52, 20, 4, 12, 256, "arm_left_back", FALSE, FALSE);

            $this->minecraft_skin_3d_part($original,  44, 16, 4, 4, 256, "arm_right_top", FALSE, TRUE);
            $this->minecraft_skin_3d_part($original,  48, 16, 4, 4, 256, "arm_right_bottom", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  40, 20, 4, 12, 256, "arm_right_outer", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  44, 20, 4, 12, 256, "arm_right_front", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  48, 20, 4, 12, 256, "arm_right_inner", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  52, 20, 4, 12, 256, "arm_right_back", TRUE, FALSE);

            $this->minecraft_skin_3d_part($original,  4, 16, 4, 4, 256, "leg_left_top", TRUE, TRUE);
            $this->minecraft_skin_3d_part($original,  8, 16, 4, 4, 256, "leg_left_bottom", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  0, 20, 4, 12, 256, "leg_left_outer", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  4, 20, 4, 12, 256, "leg_left_front", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  8, 20, 4, 12, 256, "leg_left_inner", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  12, 20, 4, 12, 256, "leg_left_back", FALSE, FALSE);

            $this->minecraft_skin_3d_part($original,  4, 16, 4, 4, 256, "leg_right_top", FALSE, TRUE);
            $this->minecraft_skin_3d_part($original,  8, 16, 4, 4, 256, "leg_right_bottom", FALSE, FALSE);
            $this->minecraft_skin_3d_part($original,  8, 20, 4, 12, 256, "leg_right_outer", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  4, 20, 4, 12, 256, "leg_right_front", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  0, 20, 4, 12, 256, "leg_right_inner", TRUE, FALSE);
            $this->minecraft_skin_3d_part($original,  12, 20, 4, 12, 256, "leg_right_back", TRUE, FALSE);

            //Release original from memory (Skin from minecraft.net)
            imagedestroy($original);
        }
    

}

?>
