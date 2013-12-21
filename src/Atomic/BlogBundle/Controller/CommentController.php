<?php

namespace Atomic\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Atomic\BlogBundle\Entity\Comment;
use Atomic\BlogBundle\Form\CommentType;

/**
 * Comment controller.
 */
class CommentController extends Controller {

    public function newAction($blog_id) {
        $blog = $this->getBlog($blog_id);


        $comment = new Comment();
        $comment->setBlog($blog);


        $form = $this->createForm(new CommentType(), $comment);

        return $this->render('AtomicBlogBundle:Comment:form.html.twig', array(
                    'comment' => $comment,
                    'form' => $form->createView()
        ));
    }

    public function createAction($blog_id) {
        $blog = $this->getBlog($blog_id);

        $comment = new Comment();
        $comment->setBlog($blog);
        $user = $this->get('security.context')->getToken()->getUser();
        $user = $this->getDoctrine()
                        ->getManager()->getRepository('AtomicUserBundle:User')->find($user->getId());
       
        $comment->setUser($user);
        $request = $this->getRequest();
        $form = $this->createForm(new CommentType(), $comment);



        $form->bind($request);



        if ($form->isValid()) {

            $em = $this->getDoctrine()
                    ->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('AtomicBlogBundle_blog_show', array(
                                'id' => $comment->getBlog()->getId())) .
                            '#comment-' . $comment->getId()
            );
        }

        return $this->render('AtomicBlogBundle:Comment:create.html.twig', array(
                    'comment' => $comment,
                    'form' => $form->createView()
        ));
    }

    protected function getBlog($blog_id) {
        $em = $this->getDoctrine()
                ->getManager();

        $blog = $em->getRepository('AtomicBlogBundle:Blog')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }

}