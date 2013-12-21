<?php

namespace Atomic\ServerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Atomic\ServerBundle\Entity\Server;
use Atomic\ServerBundle\Form\ServerType;

/**
 * Server controller.
 *
 * @Route("/server")
 */
class ServerController extends Controller {

    /**
     * Lists all Server entities.
     *
     * @Route("/", name="server")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtomicServerBundle:Server')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Server entity.
     *
     * @Route("/", name="server_create")
     * @Method("POST")
     * @Template("AtomicServerBundle:Server:new.html.twig")
     */
    public function createAction(Request $request) {
        
         if(!$this->isUserAdmin())
        {
            die("WHAT?");
        }
        
        $entity = new Server();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('atomic_server_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Server entity.
     *
     * @param Server $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Server $entity) {
        $form = $this->createForm(new ServerType(), $entity, array(
            'action' => $this->generateUrl('atomic_server_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Server entity.
     *
     * @Route("/new", name="server_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        if(!$this->isUserAdmin())
        {
            die("WHAT?");
        }
        $entity = new Server();
        $form = $this->createCreateForm($entity);
                   
        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Server entity.
     *
     * @Route("/{id}", name="server_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        


        $em = $this->getDoctrine()->getManager();

        $server = $em->getRepository('AtomicServerBundle:Server')->find($id);

        if (!$server) {
            throw $this->createNotFoundException('Unable to find Server entity.');
        }

        //     $deleteForm = $this->createDeleteForm($id);

        return array(
            'server' => $server,
            'isAdmin' => $this->isUserAdmin()
                //       'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Server entity.
     *
     * @Route("/{id}/edit", name="server_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        if(!$this->isUserAdmin())
        {
            die("WHAT?");
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtomicServerBundle:Server')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Server entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Server entity.
     *
     * @param Server $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Server $entity) {
        $form = $this->createForm(new ServerType(), $entity, array(
            'action' => $this->generateUrl('atomic_server_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Server entity.
     *
     * @Route("/{id}", name="server_update")
     * @Method("PUT")
     * @Template("AtomicServerBundle:Server:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        
        if(!$this->isUserAdmin())
        {
            die("WHAT?");
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtomicServerBundle:Server')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Server entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('atomic_server_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Server entity.
     *
     * @Route("/{id}", name="server_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        
        if(!$this->isUserAdmin())
        {
            die("WHAT?");
        }
        
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtomicServerBundle:Server')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Server entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('atomic_server_list'));
    }

    /**
     * Creates a form to delete a Server entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('atomic_server_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }
    
    private function isUserAdmin()
    {
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
