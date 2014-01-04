<?php

namespace Atomic\UserBundle\Model;

use Atomic\UserBundle\Model\PartySkin;

abstract class ImageType {

    const HEAD_FRONT = 0;
    const HEAD_TOP = 1;
    const HEAD_LEFT = 2;

}

class IsometricSkin extends PartySkin {

    private $partySkinDir;
    private $cacheSkinIamge = "isometric.png";

    public function __construct($partySkinDir) {
        $this->partySkinDir = $partySkinDir . "/";
    }

    public function getIsometricSkin($scale = 0.3) {


        $skin = new \Imagick();
        $skin->newImage(1500 * $scale, 2500 * $scale, new \ImagickPixel('black'));
        $skin->setImageFormat('png');

        $headFront = $this->getTransormedImage($this->headImages['head_front'], ImageType::HEAD_FRONT, $scale, 20 * $scale);

        $headTop = $this->getTransormedImage($this->headImages['head_top'], ImageType::HEAD_TOP, $scale, 20 * $scale);

        $skin->compositeimage($headTop, \Imagick::COMPOSITE_ADD, 150, 0);
        $skin->compositeimage($headFront, \Imagick::COMPOSITE_ADD, 150, $headTop->getimageheight());

        header("Content-Type: image/png");
        echo $skin;
        die();
    }

    private function getTransormedImage($image, $imageType, $scale = 1, $transformValue = 20) {


        $image = new \Imagick($this->partySkinDir . $image);



        $image->scaleimage($image->getimagewidth() * $scale, $image->getimageheight() * $scale);


        $image->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

        $image = $this->extendImage($imageType, $image, $transformValue);

        $image->setImageMatte(true);

        $controlPoints = $this->getControlPoints($imageType, $image, $transformValue);

        $image->distortimage(\Imagick::DISTORTION_PERSPECTIVE, $controlPoints, true);
        
        $image->trimimage(0);
        
        return $image;
    }

    private function getControlPoints($imageType, \Imagick $image, $transformValue = 1) {
        switch ($imageType) {
            case ImageType::HEAD_FRONT: {

                    $controlPoints = array(
                        0, 0, //x y s top left
                        0, $transformValue, //x y d
                        0, $image->getImageHeight(), //bottom left
                        0, $image->getImageHeight() + $transformValue,
                        $image->getImageWidth(), 0, //top rigth
                        $image->getImageWidth() - 0, -$transformValue,
                        $image->getImageWidth() - 0, $image->getImageHeight() - 0, //bottom right
                        $image->getImageWidth() + 0, $image->getImageHeight() - $transformValue
                    );
                    return $controlPoints;
                }

            case ImageType::HEAD_TOP: {

                    $controlPoints = array(
                        0, 0, //x y s top left
                        0, $transformValue, //x y d
                        
                        0, $image->getImageHeight(), //bottom left
                        0, $image->getImageHeight() + $transformValue,
                        
                        
                        $image->getImageWidth(), 0, //top rigth
                        $image->getImageWidth() - $transformValue*4, -$transformValue,
                        
                        $image->getImageWidth() - 0, $image->getImageHeight() - 0, //bottom right
                        $image->getImageWidth() + 0, $image->getImageHeight() - $transformValue
                    );
                    return $controlPoints;
                }
        }
    }

    private function extendImage($imageType, \Imagick $image, $transformValue = 1) {
        switch ($imageType) {
            case ImageType::HEAD_FRONT: {


                    $image->extentImage($image->getimagewidth(), $image->getimageheight() + 0 * 1, 0, 0);
                    return $image;
                }

            case ImageType::HEAD_TOP: {
                    // $image->rotateimage("red", 45);
                    $image->extentImage($image->getimagewidth(), $image->getimageheight() + 0 * 1, 0, 0);
                    return $image;
                }
        }
    }

}

?>
