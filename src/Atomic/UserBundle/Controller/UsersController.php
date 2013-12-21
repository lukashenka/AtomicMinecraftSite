<?php

namespace Atomic\UserBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller {

    public function showAction($id) {
        $user = $this->getDoctrine()
                        ->getManager()->getRepository('AtomicUserBundle:User')->find($id);


        
        return $this->render('AtomicUserBundle:User:show.html.twig', array(
                    'user' => $user
        ));
    }

    public function listAction() {
        $users = $this->getDoctrine()
                        ->getManager()->getRepository('AtomicUserBundle:User')->findAll();




        return $this->render('AtomicUserBundle:Users:list.html.twig', array(
                    'users' => $users,
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