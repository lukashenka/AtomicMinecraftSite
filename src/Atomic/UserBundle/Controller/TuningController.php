<?php

namespace Atomic\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Atomic\UserBundle\Form\SkinType;
use Atomic\UserBundle\Form\CloackType;
use Atomic\UserBundle\Entity\Skin;
use Atomic\UserBundle\Entity\Cloack;
use Atomic\UserBundle\Model\MinecraftSkin;
use Atomic\UserBundle\Model\MinecraftCloack;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class TuningController extends Controller {

    public function indexAction() {


        $skinUploadForm = $this->createForm(new SkinType());
        $cloackUploadForm = $this->createForm(new CloackType());
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $skin = $em->getRepository('AtomicUserBundle:Skin')->findOneByUser($user);

        if (!$skin || !is_file($skin->getRootFilePath())) {

            $skin = $this->getDefaultUserSkin($user);
        }


        $cloack = $em->getRepository('AtomicUserBundle:Cloack')->findOneByUser($user);

        if (!$cloack || !is_file($cloack->getRootFilePath())) {

            $cloack = $this->getDefaultUserCloack($user);
        }


        return $this->render('AtomicUserBundle:Tuning:index.html.twig', array(
                    'form_skin' => $skinUploadForm->createView(),
                    'form_cloack' => $cloackUploadForm->createView(),
                    'user' => $user,
                    'skin' => $skin,
                    'cloack'=>$cloack
                        )
        );
    }

    public function uploadSkinAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $skin = $em->getRepository('AtomicUserBundle:Skin')->findOneByUser($user);

        if (!isset($skin))
            $skin = new Skin();


        $skin->setUploaded(new \DateTime());

        $form = $this->createForm(new SkinType($skin));
        $form->bind($request);


        $skin->setFile($form->getData()->getFile());

        $skin->setUser($user);

        if ($form->isValid()) {

            $path = $skin->upload();
            $skin->setPath($path);

            $em->persist($skin);
            $em->flush();

            $minecraftSkin = new MinecraftSkin($skin->getRootFilePath(), $user, $skin->getUploadRootDir());

            $minecraftSkin->minecraft_skin_to_part();


            return $this->render('AtomicUserBundle:Tuning:succes-upload.html.twig', array(
                        'user' => $user
                            )
            );
        } else {
            $validator = $this->get('validator');

            $errors = $validator->validate($skin);
            return $this->render('AtomicUserBundle:Tuning:error-upload.html.twig', array(
                        'errors' => $errors,
                            )
            );
        }
    }

    public function uploadCloackAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $cloack = $em->getRepository('AtomicUserBundle:Cloack')->findOneByUser($user);

        if (!isset($cloack)) {
            $cloack = new Cloack();
        }

        $cloack->setUploaded(new \DateTime());

        $form = $this->createForm(new CloackType($cloack));
        $form->bind($request);


        $cloack->setFile($form->getData()->getFile());



        $cloack->setUser($user);

        if ($form->isValid()) {

            $path = $cloack->upload();
            $cloack->setPath($path);

            $em->persist($cloack);
            $em->flush();

            $minecraftCloack = new MinecraftCloack($cloack->getRootFilePath(), $user, $cloack->getUploadRootDir());
            $minecraftCloack->savePartyCloack();



            return $this->render('AtomicUserBundle:Tuning:succes-upload.html.twig', array(
                        'user' => $user
                            )
            );
        } else {
            $validator = $this->get('validator');

            $errors = $validator->validate($cloack);
            return $this->render('AtomicUserBundle:Tuning:error-upload.html.twig', array(
                        'errors' => $errors,
                            )
            );
        }
    }

    private function getUserProfile() {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        if (!$user) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $user;
    }

    private function getDefaultUserSkin($user) {
        $em = $this->getDoctrine()->getManager();
        $skin = new Skin();
        $skin->setUser($user);
        $defaultSkin = $skin->getUploadRootDir() . "../default-skin.png";
        $path = $skin->getUploadRootDir() . $user->getUsername() . ".png";
        copy($defaultSkin, $path);
        $path = $skin->getUploadDir() . $user->getUsername() . ".png";
        $skin->setPath($path);
        $em->persist($skin);
        $em->flush();

        $minecraftSkin = new MinecraftSkin($skin->getUploadRootDir() . $user->getUsername() . ".png", $user, $skin->getUploadRootDir());

        $minecraftSkin->minecraft_skin_to_part();

        return $skin;
    }

    private function getDefaultUserCloack($user) {
        $em = $this->getDoctrine()->getManager();
        $cloack = new Cloack();
        $cloack->setUser($user);
        $defaultSkin = $cloack->getUploadRootDir() . "../default-cloack.png";
        $path = $cloack->getUploadRootDir() . $user->getUsername() . ".png";
        copy($defaultSkin, $path);
        $path = $cloack->getUploadDir() . $user->getUsername() . ".png";
        $cloack->setPath($path);
        $cloack->setUploaded(new \DateTime());
        $em->persist($cloack);
        $em->flush();

        $minecraftCloack = new MinecraftCloack($cloack->getUploadRootDir() . $user->getUsername() . ".png", $user, $cloack->getUploadRootDir());
        $minecraftCloack->savePartyCloack();

        return $cloack;
    }

}
