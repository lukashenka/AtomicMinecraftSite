<?php

namespace Atomic\ShopBundle\Controller;

use Atomic\ShopBundle\Entity\Iconomy;
use Atomic\ShopBundle\Form\Type\RublesToShishsType;
use Atomic\ShopBundle\Form\Type\ShishsToRublesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Atomic\ShopBundle\Entity\MoneyLogger;

class ShopController extends Controller {

    public function indexAction() {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());

        return $this->render('AtomicShopBundle:Default:index.html.php', array("atomic_user" => $user));
    }

    public function rublesToShishesAction() {
        
    }

    public function exchangerAction() {


        $user = $this->getUserProfile();

        $kurs_str_c = $this->container->getParameter('kurs_str_c');
        $kurs_str_h = $this->container->getParameter('kurs_str_h');
        $kurs_rts = $this->container->getParameter('kurs_rts');

        $rts = new RublesToShishsType();
        $rts->setServer("hitech");
        $rtsHitechForm = $this->createForm($rts);

        $rts = new RublesToShishsType();
        $rts->setServer("classic");
        $rtsClassicForm = $this->createForm($rts);

        $str = new ShishsToRublesType();
        $str->setServer("hitech");
        $strHitechForm = $this->createForm($str);

        $str = new ShishsToRublesType();
        $str->setServer("classic");
        $strClassicForm = $this->createForm($str);

        $emClassic = $this->get('doctrine')->getManager('classic');
        $emHitech = $this->get('doctrine')->getManager('hitech');



        $classicStatus = $emClassic->getRepository('AtomicShopBundle:Iconomy')->findOneByUsername($user->getUsernameCanonical());


        if (!$classicStatus) {
            $classicStatus = new Iconomy();
            $classicStatus->setStatus(0);
            $classicStatus->setBalance(0);
            $classicStatus->setUsername($user->getUsernameCanonical());
            $emClassic->persist($classicStatus);
            $emClassic->flush();
        }

        $hitechStatus = $emHitech->getRepository('AtomicShopBundle:Iconomy')->findOneByUsername($user->getUsernameCanonical());

        if (!$hitechStatus) {
            $hitechStatus = new Iconomy();
            $hitechStatus->setStatus(0);
            $hitechStatus->setBalance(0);
            $hitechStatus->setUsername($user->getUsernameCanonical());
            $emHitech->persist($classicStatus);
            $emHitech->flush();
        }






        return $this->render('AtomicShopBundle:Shop:exchanger.html.twig', array("classicStatus" => $classicStatus,
                    'hitechStatus' => $hitechStatus, "user" => $user,
                    'rtsHitech' => $rtsHitechForm->createView(),
                    'rtsClassic' => $rtsClassicForm->createView(),
                    'strHitech' => $strHitechForm->createView(),
                    'strClassic' => $strClassicForm->createView(),
                    'kurs_str_h' => $kurs_str_h,
                    'kurs_str_c' => $kurs_str_c,
                    'kurs_rts' => $kurs_rts
        ));
    }

    public function buyshishsAction(Request $request) {


        $user = $this->getUserProfile();





        $kurs_rts = $this->container->getParameter('kurs_rts');

        $rts = new RublesToShishsType();
        $rts = $this->createForm($rts);
        $rts->bind($request);
        $rtsData = $rts->getData();

        $emDefault = $this->get('doctrine')->getManager();

        $emServer = $this->get('doctrine')->getManager($rtsData['server']);



        $iconomy = $emServer->getRepository('AtomicShopBundle:Iconomy')->findOneByUsername($user->getUsernameCanonical());

        if ($iconomy) {

            $shishs = $rtsData['shishs'];
            $coins = $user->getCoins();
            $newCoins = $coins - ceil($shishs / $kurs_rts);
            $deltaCoins = $coins - $newCoins;
            $newShishs = $iconomy->getBalance() + $shishs;

            if ($shishs * $kurs_rts > $coins && $newShishs >= 0 && $newCoins >= 0) {

                $user->setCoins($newCoins);
                $emDefault->persist($user);
                $emDefault->flush();

                $iconomy->setBalance($newShishs);
                $emServer->persist($iconomy);
                $emServer->flush();

                $moneyLogger = new MoneyLogger();
                $moneyLogger->setUser($user);
                $moneyLogger->setDate(new \DateTime("now"));
                $moneyLogger->setType('rts');

                $moneyLogger->setValue($shishs);
                $emDefault->persist($moneyLogger);
                $emDefault->flush();

                return $this->render('AtomicShopBundle:Shop:exchanger.success.html.twig', array(
                            "operation" => "rts",
                            "shishs" => $shishs,
                            "deltaCoins" => $deltaCoins,
                ));
            } else {
                die("Недостаточно средств для совершения операции");
            }
        }
        else
            die("Пользователь не найден");

        var_dump($rts->get('server'));
        die();
    }

    public function buyrublesAction(Request $request) {


        $user = $this->getUserProfile();

        $kurs_str_c = $this->container->getParameter('kurs_str_c');
        $kurs_str_h = $this->container->getParameter('kurs_str_h');
        $kurs_rts = $this->container->getParameter('kurs_rts');

        $str = new ShishsToRublesType();
        $str = $this->createForm($str);
        $str->bind($request);
        $strData = $str->getData();

        $emDefault = $this->get('doctrine')->getManager();

        $emServer = $this->get('doctrine')->getManager($strData['server']);

        switch ($strData['server']) {
            case 'hitech': {
                    $kurs_str = $kurs_str_h;
                    $type="h";
                    break;
                }
            case 'classic': {
                    $kurs_str = $kurs_str_c;
                    $type="c";
                    break;
                }
        }

        $iconomy = $emServer->getRepository('AtomicShopBundle:Iconomy')->findOneByUsername($user->getUsernameCanonical());

        if ($iconomy) {

            $rublesTransaction = $strData['rubles'];

            $currShishs = $iconomy->getBalance();

            $newShishs = $currShishs - $rublesTransaction * $kurs_str;

            $deltaShishs = $currShishs - $newShishs;

            $currRubles = $user->getCoins();

            $newRubles = $currRubles + $rublesTransaction;
            $deltaCoins = $rublesTransaction;

            if ($newRubles >= 0 && $newShishs >= 0) {

                $user->setCoins($newRubles);
                $emDefault->persist($user);
                $emDefault->flush();

                $iconomy->setBalance($newShishs);
                $emServer->persist($iconomy);
                $emServer->flush();

                $moneyLogger = new MoneyLogger();
                $moneyLogger->setUser($user);
                $moneyLogger->setDate(new \DateTime("now"));
                $moneyLogger->setType('str_'.$type);

                $moneyLogger->setValue($deltaCoins);
                
                $emDefault->persist($moneyLogger);
                $emDefault->flush();

                return $this->render('AtomicShopBundle:Shop:exchanger.success.html.twig', array(
                            "operation" => "str",
                            "shishs" => $deltaShishs,
                            "deltaCoins" => $rublesTransaction,
                ));
            } else {
                die("Недостаточно средств для совершения операции");
            }
        }
        else
            die("Пользователь не найден");

        var_dump($rts->get('server'));
        die();
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
