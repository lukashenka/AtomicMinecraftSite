<?php

namespace Atomic\UserBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Atomic\UserBundle\Entity\PermissionsInheritance;
use Atomic\ShopBundle\Entity\Iconomy;

class UsersController extends Controller {

    private $itemsPerPage = 52;

    public function showAction($name) {



        $em = $this->getDoctrine()->getManager();

        $emClassic = $this->get('doctrine')->getManager('classic');

        $emHitech = $this->get('doctrine')->getManager('hitech');

        $classicStatus = $emClassic->getRepository('AtomicShopBundle:Iconomy')->findOneByUsername($name);


        if (!$classicStatus) {
            $classicStatus = new Iconomy();
            $classicStatus->setStatus(0);
            $classicStatus->setBalance(0);
            $classicStatus->setUsername($name);
            $emClassic->persist($classicStatus);
            $emClassic->flush();
        }



        $hitechStatus = $emHitech->getRepository('AtomicShopBundle:Iconomy')->findOneByUsername($name);

        if (!$hitechStatus) {
            $hitechStatus = new Iconomy();
            $hitechStatus->setStatus(0);
            $hitechStatus->setBalance(0);
            $hitechStatus->setUsername($name);
            $emHitech->persist($classicStatus);
            $emHitech->flush();
        }

        $userCoins = array("classic" => $classicStatus->getbalance(),
            "hitech" => $hitechStatus->getBalance());

        $user = $this->getDoctrine()
                        ->getManager()->getRepository('AtomicUserBundle:User')->findOneByUsername($name);


        if (!is_object($user)) {

            throw $this->createNotFoundException("Unable to find User {$name}.");
        }

        $permission = $em->getRepository('AtomicUserBundle:PermissionsInheritance')->findOneByChild($user->getUsername());
        if (is_object($permission)) {
            
        } else {
            $permission = new PermissionsInheritance();
            $permission->setParent('default');
        }



        $skin = $user->getSkin();

        $cloack = $user->getCloack();


        return $this->render('AtomicUserBundle:User:show.html.twig', array(
                    'user' => $user,
                    'coins' => $userCoins,
                    'permission' => $permission,
                    'skin' => $skin,
                    'cloack' => $cloack
        ));
    }

    public function listAction() {

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AtomicUserBundle:User')->getUsersPage(1, $this->itemsPerPage);


        $countPages = ceil(count($users) / $this->itemsPerPage);

        return $this->render('AtomicUserBundle:Users:list.html.twig', array(
                    'users' => $users,
                    'countPages' => $countPages,
                    'currentPage' => 1
        ));


       
    }
    
    
    
     public function pageAction($page = 1) {
        $em = $this->getDoctrine()->getManager();
      
        $users = $em->getRepository('AtomicUserBundle:User')->getUsersPage($page, $this->itemsPerPage);

        
        $countPages = ceil(count($users) / $this->itemsPerPage);

          return $this->render('AtomicUserBundle:Users:list.html.twig', array(
                    'users' => $users,
                    'countPages' => $countPages,
                    'currentPage' => $page
        ));
    }

    public function profileAction() {

        $status_cost = $this->container->getParameter('status_cost');
        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!is_object($user)) {
            //       return null;          
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('AtomicUserBundle:Users:profile.html.twig', array("change_password_form" => $this->getChangePasswordForm($user)
                    , "edit_profile_form" => $this->getEditProfileForm($user)
                    , 'status_cost' => $status_cost,
        ));
    }

    public function getChangePasswordForm($user) {



        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.change_password.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        return $form->createView();
    }

    public function getEditProfileForm($user) {



        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        return $form->createView();
    }

    public function lastUserAction() {


        $users = $this->getDoctrine()
                        ->getManager()->getRepository('AtomicUserBundle:User')->getLastestUsers();

        return $this->render('AtomicUserBundle:Users:lastest.html.twig', array("users" => $users));
    }

}