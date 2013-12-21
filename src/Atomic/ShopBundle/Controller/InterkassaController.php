<?php

namespace Atomic\ShopBundle\Controller;

use Atomic\ShopBundle\Model\Interkassa;
use Atomic\ShopBundle\Model\InterkassaResponse;
use Atomic\ShopBundle\Form\Type\InterkassaType;
use Atomic\ShopBundle\Entity\Transaction;
use Atomic\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class InterkassaController extends Controller {

    public function indexAction() {


        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());

        $ik_id = $this->container->getParameter('shop_id');

        return $this->render('AtomicShopBundle:Default:index.html.php', array("atomic_user" => $user));
    }

    public function payAction() {

        $ik_id = $this->container->getParameter('shop_id');
        $form = $this->createForm(new InterkassaType(), new Interkassa($this->getUserProfile(), $ik_id));
        return $this->render('AtomicShopBundle:Interkassa:payform.html.twig', array("form" => $form->createView()));
    }

    public function resultAction(Request $request) {

        $secretCode = $ik_id = $this->container->getParameter('secret_key');

        $interkassa = new InterkassaResponse($request, $secretCode);


        $id_transaction = $request->get('ik_trans_id');
        $logger = $this->get('logger');
        $logger->error("Новая транзакция {$id_transaction} ");
        $ik_sign_hash = $request->get('ik_sign_hash');
        $logger->error("Секретный код {$ik_sign_hash} ");
        $logger->error("Секретный строка {$interkassa->getSingHashStr()} ");
        $logger->error("Секретный код спарсенный {$interkassa->getMd5Hash()} ");

        if ($interkassa->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $transaction = $em->getRepository('AtomicShopBundle:Transaction')->find((int) $interkassa->getIkPaymentId());
            $transaction->setStatus(1);
            $transaction->setIkId($interkassa->getIkTransId());
            $transaction->setMoney((int) $interkassa->getIkPaymentAmount());

            $user = $transaction->getUser();
            $logger->error("Перечисляем бабло юзеру {$user->getUsername()} + {$transaction->getMoney()}");
            $user->setCoins($user->getCoins() + $transaction->getMoney());
            $em->persist($user);
            $em->persist($transaction);
            $em->flush();
        } else {
            die("Проверка контрольной суммы провалена");
        }

        die("Все хорошо");
        //   return $this->render('AtomicShopBundle:Default:result.html.php', array("atomic_user" => $user));
    }

    public function successAction(Request $request)  {

        $secretCode = $ik_id = $this->container->getParameter('secret_key');
        $interkassa = new InterkassaResponse($request,$secretCode);
           $em = $this->getDoctrine()->getManager();
          // var_dump($interkassa);
        $transaction = $em->getRepository('AtomicShopBundle:Transaction')->find((int) $interkassa->getIkPaymentId());
      
        
        if($transaction)
           
        return $this->render('AtomicShopBundle:Interkassa:success.html.twig', array("interkassa" => $interkassa,
                    'transaction' => $transaction));
        else
        {
           
            return $this->render('AtomicShopBundle:Interkassa:fail.html.twig');
        }  
    }

    public function failAction(Request $request) {
        return $this->render('AtomicShopBundle:Interkassa:fail.html.twig');
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

    public function donutAction(Request $request) {

        $form = $this->createForm(new InterkassaType());

        $form->bind($request);
        $ikPostData = $form->getData();
        $transaction = new Transaction();
        $transaction->setUser($this->getUserProfile());
        $transaction->setMoney($ikPostData['ik_payment_amount']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($transaction);

        $em->flush();

        $ikPostData['ik_payment_id'] = $transaction->getId();

        if (is_object($this->getUserProfile())) {



            $response = new RedirectResponse("http://www.interkassa.com/lib/payment.php?" . http_build_query($ikPostData));


            return $response;


            return $this->redirect($this->generateUrl('atomic_shop_interkassa_post', $ikPostData));
        } else {
            return $this->render('AtomicBlogBundle:Blog:edit.form.html.twig', array(
                        'form' => $form->createView()));
        }
    }

}

