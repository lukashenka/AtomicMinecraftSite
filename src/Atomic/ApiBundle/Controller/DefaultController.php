<?php

namespace Atomic\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AtomicApiBundle:Default:index.html.twig', array('name' => $name));
    }
}
