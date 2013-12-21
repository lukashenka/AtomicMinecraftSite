<?php

namespace Atomic\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller {
private $itemsPerPage =4;
    public function indexAction() {

        $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('AtomicBlogBundle:Blog')->getBlogPage(1, $this->itemsPerPage);

        
        $countPages = ceil(count($blogs) / $this->itemsPerPage);

        return $this->render('AtomicBlogBundle:Page:index.html.twig', array(
                    'blogs' => $blogs,
                    'countPages' => $countPages,
                    'currentPage' => 1,
                    'is_user_admin' => $this->isUserAdmin()
        ));
    }

    public function pageAction($page = 1) {
        $em = $this->getDoctrine()->getManager();
        //  $blogPaging = $em->getRepository('AtomicBlogBundle:Blog')->getPaginatorBlog();
        $blogs = $em->getRepository('AtomicBlogBundle:Blog')->getBlogPage($page, $this->itemsPerPage);

        
        $countPages = ceil(count($blogs) / $this->itemsPerPage);

        return $this->render('AtomicBlogBundle:Page:index.html.twig', array(
                    'blogs' => $blogs,
                    'is_user_admin' => $this->isUserAdmin(),
                      'currentPage' => $page,
                    'countPages' => $countPages
        ));
    }

    private function isUserAdmin() {
        $isUserAdmin = false;
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        if (is_object($user)) {
            $isUserAdmin = $user->hasGroup("ADMINISTRATOR");
        }

        return $isUserAdmin;
    }

}