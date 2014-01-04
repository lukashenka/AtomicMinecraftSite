<?php

namespace Atomic\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Atomic\UserBundle\Model\IsometricSkin;

use Atomic\UserBundle\Entity\User;

class TestController extends Controller
{
    public function testAction()
    {
        
        $user = $this->getUser();
      
        
        $skin = $user->getSkin();
      
        
        $isometricSkin = new IsometricSkin($skin->getUploadRootDir().$user->getUsername());
        $isometricImage = $isometricSkin->getIsometricSkin();
        
        return $this->render('AtomicUserBundle:Test:index.html.twig');
    }
}
