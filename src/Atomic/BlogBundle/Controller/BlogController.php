<?php

namespace Atomic\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Atomic\BlogBundle\Entity\Blog;
use Atomic\BlogBundle\Form\BlogType;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Blog controller.
 */
class BlogController extends Controller {

    private $commentsPerPage = 10;

    /**
     * Show a blog entry
     */
    public function showAction($id, $page = 1) {

        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('AtomicBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());


        $countComments = $em->getRepository('AtomicBlogBundle:Comment')
                ->countComments($blog->getId());

        $countPages = ceil($countComments / $this->commentsPerPage);

        $comments = $em->getRepository('AtomicBlogBundle:Comment')
                ->getCommentsForBlog($blog->getId(), $countPages, $this->commentsPerPage);

        if(!count($comments))
        $comments=new \Atomic\BlogBundle\Entity\Comment();

        $isUserAdministrator = false;
        $isRegisteredUser = false;
        if (is_object($user)) {
            if ($user->hasRole("ROLE_REGISTERED")) {
                $isRegisteredUser = true;



                if ($user->hasGroup("ADMINISTRATOR")) {
                    $isUserAdministrator = true;
                }
            }
        }
        return $this->render('AtomicBlogBundle:Blog:show.html.twig', array(
                    'blog' => $blog,
                    'comments' => $comments,
                    'is_registered_user' => $isRegisteredUser,
                    'is_user_administrator' => $isUserAdministrator,
                    'currentPage' => $countPages,
                    'countPages' => $countPages
        ));
    }

    public function pageAction($id, $page = 1) {

        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('AtomicBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());


        $countComments = $em->getRepository('AtomicBlogBundle:Comment')
                ->countComments($blog->getId());

        $countPages = ceil($countComments / $this->commentsPerPage);

        $comments = $em->getRepository('AtomicBlogBundle:Comment')
                ->getCommentsForBlog($blog->getId(), $page, $this->commentsPerPage);



        $isUserAdministrator = false;
        $isRegisteredUser = false;
        if (is_object($user)) {
            if ($user->hasRole("ROLE_REGISTERED")) {
                $isRegisteredUser = true;



                if ($user->hasGroup("ADMINISTRATOR")) {
                    $isUserAdministrator = true;
                }
            }
        }
        return $this->render('AtomicBlogBundle:Blog:show.html.twig', array(
                    'blog' => $blog,
                    'comments' => $comments,
                    'is_registered_user' => $isRegisteredUser,
                    'is_user_administrator' => $isUserAdministrator,
                    'currentPage' => $page,
                    'countPages' => $countPages
        ));
    }

    public function deleteAction($blog_id) {
        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository('AtomicBlogBundle:Blog')->find($blog_id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        if (is_object($user)) {
            if ($user->hasGroup("ADMINISTRATOR")) {

                $em->remove($blog);
                $em->flush();
                $url = $this->container->get('router')->generate('AtomicBlogBundle_homepage');
                $response = new RedirectResponse($url);
                return $response;
            }
        } else {

            die("fucku");
        }
    }

    public function createAction() {
        $blog = new Blog();

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());

        $blog->setAuthor($user);
        $request = $this->getRequest();
        $form = $this->createForm(new BlogType(), $blog);
    
        $form->bind($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()
                    ->getManager();
            $em->persist($blog);
            $em->flush();

            return $this->redirect($this->generateUrl('AtomicBlogBundle_homepage'));
        }
        return $this->render('AtomicBlogBundle:Comment:create.html.twig', array(
                    'comment' => $comment,
                    'form' => $form->createView()
        ));
    }

    public function editAction($blog_id) {

        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository('AtomicBlogBundle:Blog')->find($blog_id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        $form = $this->createForm(new BlogType(), $blog);

        return $this->render('AtomicBlogBundle:Blog:edit.form.html.twig', array(
                    'form' => $form->createView(),
                    "blog" => $blog
        ));
    }

    public function editSaveAction(Request $request) {


        $blog_id = (int) $request->get("blog_id");

        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository('AtomicBlogBundle:Blog')->find($blog_id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        $form = $this->createForm(new BlogType(), $blog);

        if (is_object($user)) {
            if ($user->hasGroup("ADMINISTRATOR")) {

                $form->bind($request);
                if ($form->isValid()) {

                    $em = $this->getDoctrine()
                            ->getManager();
                    $em->persist($blog);
                    $em->flush();

                    return $this->redirect($this->generateUrl('AtomicBlogBundle_blog_show', array("id" => $blog_id)));
                } else {
                    return $this->render('AtomicBlogBundle:Blog:edit.form.html.twig', array(
                                'form' => $form->createView()
                    ));
                }
            }
        } else {
            die("fuck u");
        }
    }

    public function newAction() {


        $blog = new Blog();

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());

        if (is_object($user)) {
            if ($user->hasGroup("ADMINISTRATOR")) {

                $blog->setAuthor($user);

                $form = $this->createForm(new BlogType(), $blog);

                return $this->render('AtomicBlogBundle:Blog:add.form.html.twig', array(
                            'blog' => $blog,
                            'form' => $form->createView()
                ));
            }
        } else {
            die("fuck u");
        }
    }

}