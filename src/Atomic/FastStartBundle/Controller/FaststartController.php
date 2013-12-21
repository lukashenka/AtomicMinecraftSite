<?php

namespace Atomic\FastStartBundle\Controller;

use Atomic\FastStartBundle\Entity\FastStart;
use Atomic\FastStartBundle\Form\FastStartType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
class FaststartController extends Controller {

    public function indexAction() {

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        $isUserAdministrator = false;
        if (is_object($user)) {
            if ($user->hasGroup("ADMINISTRATOR")) {
                $isUserAdministrator = true;
            }
        }

        $em = $this->getDoctrine()->getManager();
        $faststarts = $em->getRepository('AtomicFastStartBundle:FastStart')->getFastStart();
        if (!$faststarts) {
            //     throw $this->createNotFoundException('Unable to find Faststart posts.');
        }


        return $this->render('AtomicFastStartBundle:Faststart:index.html.twig', array(
                    'is_user_administrator' => $isUserAdministrator,
                    'fast_start' => $faststarts
        ));
    }

    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('AtomicBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        $comments = $em->getRepository('AtomicBlogBundle:Comment')
                ->getCommentsForBlog($blog->getId());
        if (is_object($user)) {
            if ($user->hasRole("ROLE_REGISTERED")) {


                $isUserAdministrator = false;

                if ($user->hasGroup("ADMINISTRATOR")) {
                    $isUserAdministrator = true;
                }

                return $this->render('AtomicBlogBundle:Blog:show.html.twig', array(
                            'blog' => $blog,
                            'comments' => $comments,
                            'is_registered_user' => true,
                            'is_user_administrator' => $isUserAdministrator
                ));
            }
        } else {

            return $this->render('AtomicBlogBundle:Blog:show.html.twig', array(
                        'blog' => $blog,
                        'comments' => $comments,
                        'is_registered_user' => false
            ));
        }
    }

    public function deleteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $f_item = $em->getRepository('AtomicFastStartBundle:FastStart')->find($id);
        if (!$f_item) {
            throw $this->createNotFoundException('Unable to find fastart item post.');
        }
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        if (is_object($user)) {
            if ($user->hasGroup("ADMINISTRATOR")) {

                $em->remove($f_item);
                $em->flush();
                $url = $this->container->get('router')->generate('AtomicFirstStartBundle_homepage');
                $response = new RedirectResponse($url);
                return $response;
            }
        } else {

            die("fucku");
        }
    }

    public function createAction() {
        $f_item = new FastStart();

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());


        $request = $this->getRequest();
        $form = $this->createForm(new FastStartType(), $f_item);
        $form->bind($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()
                    ->getManager();
            $em->persist($f_item);
            $em->flush();

            return $this->redirect($this->generateUrl('AtomicFirstStartBundle_homepage'));
        }
        return $this->render('AtomicFirstStartBundle_addstep', array(
                    'form' => $form->createView()
        ));
    }

    public function editAction($id) {

        $em = $this->getDoctrine()->getManager();
        $f_item = $em->getRepository('AtomicFastStartBundle:FastStart')->find($id);
        if (!$f_item) {
            throw $this->createNotFoundException('Unable to find FastStart post.');
        }
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());

        if (is_object($user)) {
            if (!$user->hasGroup("ADMINISTRATOR")) {
                die("fucku");
            }
        }
        $form = $this->createForm(new FastStartType(), $f_item);

        return $this->render('AtomicFastStartBundle:Faststart:edit.form.html.twig', array(
                    'form' => $form->createView(),
                    "f_item" => $f_item
        ));
    }

    public function editSaveAction(Request $request) {


        $id = (int) $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $f_item = $em->getRepository('AtomicFastStartBundle:FastStart')->find($id);
        if (!$f_item) {
            throw $this->createNotFoundException('Unable to find Faststart post.');
        }
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        $form = $this->createForm(new FastStartType(), $f_item);

        if ($user->hasGroup("ADMINISTRATOR")) {

            $form->bind($request);
            if ($form->isValid()) {
            
                $em->persist($f_item);
                $em->flush();

                return $this->redirect($this->generateUrl('AtomicFirstStartBundle_homepage'));
            } else {
                return $this->render('AtomicFastStartBundle:FastStart:edit.form.html.twig', array(
                            'form' => $form->createView()
                ));
            }
        } else {
            die("fuck u");
        }
    }

    public function newAction() {


        $f_item = new FastStart();
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());


        if ($user->hasGroup("ADMINISTRATOR")) {

            $form = $this->createForm(new FastStartType(), $f_item);

            return $this->render('AtomicFastStartBundle:Faststart:add.form.html.twig', array(
                        'f_item' => $f_item,
                        'form' => $form->createView()
            ));
        } else {
            die("fuck u");
        }
    }

}
