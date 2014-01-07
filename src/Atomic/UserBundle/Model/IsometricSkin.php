<?php

namespace Atomic\UserBundle\Model;

use Atomic\UserBundle\Model\PartySkin;

abstract class ImageType {

    const HEAD_FRONT = 0;
    const HEAD_TOP = 1;
    const HEAD_LEFT = 2;
    const BODY_FRONT = 3;
    const BODY_TOP = 4;
    const ARM_LEFT_FRONT = 5;
    const ARM_LEFT_TOP = 6;
    const ARM_LEFT_LEFT = 7;
    const ARM_RIGHT_FRONT = 8;
    const ARM_RIGHT_TOP = 9;
    const ARM_RIGHT_RIGHT = 10;
    const LEG_LEFT_FRONT = 11;
    const LEG_LEFT_LEFT = 12;
    const LEG_RIGHT_FRONT = 13;

}

class IsometricSkin extends PartySkin {

    private $partySkinDir;
    private $cacheSkinImage = "isometric.png";

    public function __construct($partySkinDir) {
        $this->partySkinDir = $partySkinDir . "/";
    }
    
    
    public function getCacheSkinImage()
    {
        return $this->cacheSkinImage;
    }

    public function createIsometricSkin($scale = 0.2) {


        $offsetX = 100;

        $offsetY = 10;

        $isometricValue = 50;

        $skin = new \Imagick();
        $skin->newImage(1000 * $scale, 1500 * $scale, new \ImagickPixel('transparent'));
        $skin->setImageFormat('png');

        $headFront = $this->getTransormedImage($this->headImages['head_front'], ImageType::HEAD_FRONT, $scale, 1 * $scale);
        $headTop = $this->getTransormedImage($this->headImages['head_top'], ImageType::HEAD_TOP, $scale, $isometricValue * $scale);
        $headLeft = $this->getTransormedImage($this->headImages['head_left'], ImageType::HEAD_LEFT, $scale, $isometricValue * $scale);

        $bodyFront = $this->getTransormedImage($this->bodyImages['body_front'], ImageType::BODY_FRONT, $scale, 1 * $scale);
        $bodyFront->scaleimage($bodyFront->getimagewidth(), $bodyFront->getimageheight() * 2);

        $armLeftFront = $this->getTransormedImage($this->armLeftImages['arm_left_front'], ImageType::ARM_LEFT_FRONT, $scale, 1 * $scale, true);
        $armLeftFront->scaleimage($armLeftFront->getimagewidth(), $armLeftFront->getimageheight() * 2);

        $armLeftLeft = $this->getTransormedImage($this->armLeftImages['arm_left_left'], ImageType::ARM_LEFT_LEFT, $scale, $isometricValue * $scale);
        $armLeftLeft->scaleimage($armLeftLeft->getimagewidth(), $armLeftLeft->getimageheight() * 2);

        $armLeftTop = $this->getTransormedImage($this->armLeftImages['arm_left_top'], ImageType::ARM_LEFT_TOP, $scale, $isometricValue * $scale, true);


        $armRightFront = $this->getTransormedImage($this->armRightImages['arm_right_front'], ImageType::ARM_RIGHT_FRONT, $scale, 1 * $scale, true);
        $armRightFront->scaleimage($armRightFront->getimagewidth(), $armRightFront->getimageheight() * 2);

        $armRightTop = $this->getTransormedImage($this->armRightImages['arm_right_top'], ImageType::ARM_RIGHT_TOP, $scale, $isometricValue * $scale, true);

        $legRightFront = $this->getTransormedImage($this->legRightImages['leg_right_front'], ImageType::LEG_RIGHT_FRONT, $scale, 1 * $scale, true);
        $legRightFront->scaleimage($legRightFront->getimagewidth(), $legRightFront->getimageheight() * 2);


        $legLeftLeft = $this->getTransormedImage($this->legLeftImages['leg_left_left'], ImageType::LEG_LEFT_LEFT, $scale, $isometricValue * $scale);
        $legLeftLeft->scaleimage($legLeftLeft->getimagewidth(), $legLeftLeft->getimageheight() * 2);

        $legLeftFront = $this->getTransormedImage($this->legLeftImages['leg_left_front'], ImageType::LEG_LEFT_FRONT, $scale, 1 * $scale, true);
        $legLeftFront->scaleimage($legLeftFront->getimagewidth(), $legLeftFront->getimageheight() * 2);

        $skin->compositeimage($armRightFront, \Imagick::COMPOSITE_DEFAULT, $offsetX + $bodyFront->getimagewidth() - 2, $offsetY + $headFront->getimageheight() - 5);
        $skin->compositeimage($armRightTop, \Imagick::COMPOSITE_DEFAULT, $offsetX + $bodyFront->getimagewidth() - $armRightFront->getimagewidth() / 2 - 3, $offsetY + $headFront->getimageheight() - $isometricValue * $scale - 4);



        $skin->compositeimage($headTop, \Imagick::COMPOSITE_DEFAULT, $offsetX - $headFront->getimagewidth() / 2 + $isometricValue * $scale, $offsetY - $headTop->getimageheight() + 10 * $scale);
        $skin->compositeimage($headFront, \Imagick::COMPOSITE_DEFAULT, $offsetX, $offsetY);
        $skin->compositeimage($headLeft, \Imagick::COMPOSITE_DEFAULT, $offsetX - $headLeft->getimagewidth() + 2, $offsetY - $isometricValue * $scale );



        $skin->compositeimage($bodyFront, \Imagick::COMPOSITE_DEFAULT, $offsetX, $offsetY + $headFront->getimageheight() - 4);


        $skin->compositeimage($legLeftFront, \Imagick::COMPOSITE_DEFAULT, $offsetX + 2, $offsetY + $headFront->getimageheight() + $bodyFront->getimageheight() - 12);

        $skin->compositeimage($legRightFront, \Imagick::COMPOSITE_DEFAULT, $offsetX + $bodyFront->getimagewidth() / 2 + 0, $offsetY + $headFront->getimageheight() + $bodyFront->getimageheight() - 12);
        $skin->compositeimage($legLeftLeft, \Imagick::COMPOSITE_DEFAULT, $offsetX - $bodyFront->getimagewidth() / 2 + $legLeftFront->getimagewidth() / 2 - 0, $offsetY + $headFront->getimageheight() + $bodyFront->getimageheight() - $isometricValue * $scale - 10);



        $skin->compositeimage($armLeftFront, \Imagick::COMPOSITE_DEFAULT, $offsetX - $bodyFront->getimagewidth() / 2 + 2, $offsetY + $headFront->getimageheight() - 3);
        $skin->compositeimage($armLeftLeft, \Imagick::COMPOSITE_DEFAULT, $offsetX - $bodyFront->getimagewidth() / 2 - $armLeftFront->getimagewidth() / 2 - 0, $offsetY + $headFront->getimageheight() - $isometricValue * $scale - 2);
        $skin->compositeimage($armLeftTop, \Imagick::COMPOSITE_DEFAULT, $offsetX - $bodyFront->getimagewidth() / 2 - $armLeftFront->getimagewidth() / 2 - 0, $offsetY + $headFront->getimageheight() - $isometricValue * $scale - 2);





        $this->createCacheFile($skin);
        
        return $this->getCacheSkinImage();
    }

    private function createCacheFile($image) {
        $filename = $this->partySkinDir . $this->cacheSkinImage;

        if (!file_exists($filename)) {

            file_put_contents($filename, $image);
        } else {

            $file = file($filename);
            unset($file);
            file_put_contents($filename, $image);
        }

        return $filename;
    }

    private function getTransormedImage($image, $imageType, $scale = 1, $transformValue = 20, $half = false) {


        $image = new \Imagick($this->partySkinDir . $image);


        //if arm or leg then half to horizontal
        if ($half) {
            $image->scaleimage($image->getimagewidth() / 2, $image->getimageheight());
        }

        $image->scaleimage($image->getimagewidth() * $scale, $image->getimageheight() * $scale);


        $image->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

        // $image = $this->extendImage($imageType, $image, $transformValue);

        $image->setImageMatte(true);

        $controlPoints = $this->getControlPoints($imageType, $image, $transformValue);

        $image->distortimage(\Imagick::DISTORTION_PERSPECTIVE, $controlPoints, true);
        //  $image->trimimage(0);

        return $image;
    }

    private function getControlPoints($imageType, \Imagick $image, $transformValue = 1) {
        switch ($imageType) {

            case ImageType::HEAD_FRONT:
            case ImageType::ARM_LEFT_FRONT:
            case ImageType::ARM_RIGHT_FRONT:
            case ImageType::LEG_LEFT_FRONT:
            case ImageType::LEG_RIGHT_FRONT:
            case ImageType::BODY_FRONT: {

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


            case ImageType::LEG_LEFT_LEFT:
            case ImageType::ARM_LEFT_LEFT: {

                    $controlPoints = array(
                        0, 0, //x y s top left
                        $image->getImageWidth() / 2 + $transformValue, -$transformValue / 2, //x y d
                        0, $image->getImageHeight(), //bottom left
                        $image->getImageWidth() / 2 + $transformValue, $image->getImageHeight() - $transformValue,
                        $image->getImageWidth(), 0, //top rigth
                        $image->getImageWidth() - 0, 0,
                        $image->getImageWidth() - 0, $image->getImageHeight() - 0, //bottom right
                        $image->getImageWidth() - 0, $image->getImageHeight() - 0,
                    );
                    return $controlPoints;
                }

            case ImageType::HEAD_LEFT: {

                    $controlPoints = array(
                        0, 0, //x y s top left
                        $image->getImageWidth() / 2 + $transformValue, -$transformValue, //x y d
                        0, $image->getImageHeight(), //bottom left
                        $image->getImageWidth() / 2 + $transformValue, $image->getImageHeight() - $transformValue,
                        $image->getImageWidth(), 0, //top rigth
                        $image->getImageWidth() - 0, 0,
                        $image->getImageWidth() - 0, $image->getImageHeight() - 0, //bottom right
                        $image->getImageWidth() - 0, $image->getImageHeight() - 0,
                    );
                    return $controlPoints;
                }






            case ImageType::HEAD_TOP: {

                    $controlPoints = array(
                        0, 0, //x y s top left
                        -$image->getImageWidth() / 2 + $transformValue, $image->getImageHeight() - $transformValue, //x y d
                        0, $image->getImageHeight(), //bottom left
                        0, $image->getImageHeight(),
                        $image->getImageWidth(), 0, //top rigth
                        $image->getImageWidth() - $image->getImageWidth() / 2 + $transformValue, $image->getImageHeight() - $transformValue,
                        $image->getImageWidth() - 0, $image->getImageHeight(), //bottom right
                        $image->getImageWidth() - 0, $image->getImageHeight()
                    );
                    return $controlPoints;
                }

            case ImageType::ARM_RIGHT_TOP:
            case ImageType::ARM_LEFT_TOP: {

                    $controlPoints = array(
                        0, 0, //x y s top left
                        -$image->getImageWidth() / 1 + $transformValue, $image->getImageHeight() - $transformValue, //x y d
                        0, $image->getImageHeight(), //bottom left
                        0, $image->getImageHeight(),
                        $image->getImageWidth(), 0, //top rigth
                        $image->getImageWidth() - $image->getImageWidth() / 1 + $transformValue, $image->getImageHeight() - $transformValue,
                        $image->getImageWidth() - 0, $image->getImageHeight(), //bottom right
                        $image->getImageWidth() - 0, $image->getImageHeight()
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
