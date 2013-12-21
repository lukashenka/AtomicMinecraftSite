<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Atomic\UserBundle\Controller;

use Atomic\UserBundle\Form\PermissionType;
use Atomic\UserBundle\Entity\PermissionsEntity;
use Atomic\UserBundle\Entity\PermissionsInheritance;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;

class PermissionController extends Controller {

    /**
     * Show the user
     */
    public function showAction() {

        $user = $this->container->get('security.context')->getToken()->getUser();

        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }





        $em = $this->getDoctrine()->getManager();

        $permission = $em->getRepository('AtomicUserBundle:PermissionsInheritance')->findOneByChild($user->getUsername());
        if (is_object($permission)) {
            
        } else {
            $permission = new PermissionsInheritance();
            $permission->setParent('default');
        }



        return $this->container->get('templating')->renderResponse('AtomicUserBundle:Permission:show.html.' . $this->container->getParameter('fos_user.template.engine'), array('permission' => $permission));
    }

    public function changeStatusAction(Request $request) {



        $user = $this->container->get('security.context')->getToken()->getUser();

        $status_cost = $this->container->getParameter('status_cost');

        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }


        $permissionForm = $this->createForm(new PermissionType());
        $permissionForm->bind($request);
        $permissionData = $permissionForm->getData();



        $cost = $status_cost[$permissionData['permissions']];
        if (!isset($cost)) {
            $error = "Неизвестный статус =/";
            return $this->container->get('templating')->renderResponse('AtomicUserBundle:Permission:error.html.twig', array('error' => $error));
        }

        $paymentAmont = $user->getCoins() - $cost;


        if ($paymentAmont < 0) {
            $error = "Недостаточно средств на вашем счету для выполнения операции, требуется еще " . abs($paymentAmont) . " рублей";
            return $this->container->get('templating')->renderResponse('AtomicUserBundle:Permission:failed.html.twig', array('error' => $error));
        }

        $em = $this->getDoctrine()->getManager();
        $user->setCoins($paymentAmont);

        $em->persist($user);



      


        switch ($permissionData['permissions']) {
            case 'vip': {
                    $prefix = "&4[&6V&3I&2P&4]&f ";
                    break;
                }
            case 'premium': {
                    $prefix = "&2[&6Premium&2]&f ";
                    break;
                }

            default : {
                    $prefix = "&2[&Чтото пошло не то&2]&f ";
                    break;
                }
        }

        $pEntity = $em->getRepository("AtomicUserBundle:PermissionsEntity")->findOneByName($user->getUsername());
        
        if (!is_object($pEntity)) {
            $pEntity = new PermissionsEntity();
        }

        $pEntity->setName($user->getUsername());
        $pEntity->setPrefix($prefix);
        $pEntity->getSuffix('&f');
        $pEntity->setDefault(0);
        $pEntity->setType(1);

        $em->persist($pEntity);

        $pInheritance = $em->getRepository("AtomicUserBundle:PermissionsInheritance")->findOneByChild($user->getUsername());


        if (!is_object($pInheritance)) {
            $pInheritance = new PermissionsInheritance();
        }


        $pInheritance->setChild($user->getUsername());
        $pInheritance->setParent($permissionData['permissions']);
        $pInheritance->setType(1);

        $date = new \DateTime("now");
        $date->modify("+1 month");

        $pInheritance->setExpired($date);


        $em->persist($pInheritance);
        $em->flush();

        return $this->container->get('templating')->renderResponse('AtomicUserBundle:Permission:success.html.twig', array
                    ('status' => $permissionData['permissions'],
                    'permission' => $pInheritance));
    }

    public function changePermissionFormAction() {

        $form = $this->createForm(new PermissionType());

        return $this->container->get('templating')->renderResponse('AtomicUserBundle:Permission:change-permission-form.html.' . $this->container->getParameter('fos_user.template.engine'), array('form' => $form->createView()));
    }

    /**
     * Edit the user
     */
}
