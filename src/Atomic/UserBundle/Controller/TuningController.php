<?php

namespace Atomic\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Atomic\UserBundle\Form\SkinType;
use Atomic\UserBundle\Entity\Skin;
use Atomic\UserBundle\Model\MinecraftSkin;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class TuningController extends Controller {

    public function indexAction() {


        $skinUploadForm = $this->createForm(new SkinType());
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->getUser();
        
        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $skin = $em->getRepository('AtomicUserBundle:Skin')->findOneByUser($user);

        if (!$skin || !is_file($skin->getUploadRootDir() . $skin->getPath())) {
            $skin = new Skin();
            $skin->setUser($user);
            $defaultSkin = $skin->getUploadRootDir() . "../default-skin.png";
            $path = $skin->getUploadRootDir()  . $user->getUsername() . ".png";
            
            copy($defaultSkin, $path);

            $path=$skin->getUploadDir()  . $user->getUsername() . ".png";
           
            $skin->setPath($path);
            $em->persist($skin);
            $em->flush();
            
            $minecraftSkin = new MinecraftSkin($skin->getUploadRootDir().$user->getUsername() . ".png", $user, $skin->getUploadRootDir());

            $minecraftSkin->minecraft_skin_to_part();
        }



        return $this->render('AtomicUserBundle:Tuning:index.html.twig', array(
                    'form_skin' => $skinUploadForm->createView(),
                    'skin'=>$skin,
                    'user'=>$user
                        )
        );
    }

    public function uploadSkinAction(Request $request) {

        $em = $this->getDoctrine()->getEntityManager();
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

            $minecraftSkin = new MinecraftSkin($skin->getUploadRootDir() . $path, $user, $skin->getUploadRootDir());

            $minecraftSkin->minecraft_skin_to_part();


            return $this->render('AtomicUserBundle:Tuning:succes-upload.html.twig', array(
                        'skin' => $skin,
                        'user' => $user
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

}
