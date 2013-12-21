<?php

namespace Atomic\ServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AtomicServerBundle:Default:index.html.twig', array('name' => $name));
    }
}
