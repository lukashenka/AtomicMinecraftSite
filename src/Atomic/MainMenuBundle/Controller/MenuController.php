<?php

namespace Atomic\MainMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller {

    public function showAction($currentRoute) {

        $em = $this->getDoctrine()->getManager();


      
        $menu = $em->getRepository('AtomicMainMenuBundle:Menu')->getMenu();
       


        return $this->render('AtomicMainMenuBundle:Menu:index.html.twig', array('menu' => $menu, "currentRoute" => $currentRoute));
    }

}
