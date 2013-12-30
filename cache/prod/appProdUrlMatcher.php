<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/js')) {
            // _assetic_f3f271f
            if ($pathinfo === '/js/f3f271f.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'f3f271f',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_f3f271f',);
            }

            // _assetic_1b37284
            if ($pathinfo === '/js/1b37284.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '1b37284',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_1b37284',);
            }

        }

        // atomic_api_topcraft_vote
        if ($pathinfo === '/api/topcraft/vote') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_atomic_api_topcraft_vote;
            }

            return array (  '_controller' => 'Atomic\\ApiBundle\\Controller\\TopcraftController::voteAction',  '_route' => 'atomic_api_topcraft_vote',);
        }
        not_atomic_api_topcraft_vote:

        if (0 === strpos($pathinfo, '/map')) {
            // atomic_map_homepage
            if ($pathinfo === '/map') {
                return array (  '_controller' => 'Atomic\\MapBundle\\Controller\\MapController::indexAction',  '_route' => 'atomic_map_homepage',);
            }

            // atomic_map_new
            if ($pathinfo === '/map/new') {
                return array (  '_controller' => 'Atomic\\MapBundle\\Controller\\MapController::newAction',  '_route' => 'atomic_map_new',);
            }

            // atomic_map_create
            if ($pathinfo === '/map/create') {
                return array (  '_controller' => 'Atomic\\MapBundle\\Controller\\MapController::createAction',  '_route' => 'atomic_map_create',);
            }

            // atomic_map_edit
            if (0 === strpos($pathinfo, '/map/edit') && preg_match('#^/map/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_map_edit')), array (  '_controller' => 'Atomic\\MapBundle\\Controller\\MapController::editAction',));
            }

            // atomic_map_update
            if (0 === strpos($pathinfo, '/map/update') && preg_match('#^/map/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_map_update')), array (  '_controller' => 'Atomic\\MapBundle\\Controller\\MapController::updateAction',));
            }

            // atomic_map_delete
            if (0 === strpos($pathinfo, '/map/delete') && preg_match('#^/map/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_map_delete')), array (  '_controller' => 'Atomic\\MapBundle\\Controller\\MapController::deleteAction',));
            }

            // atomic_map_show
            if (0 === strpos($pathinfo, '/map/show') && preg_match('#^/map/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_map_show')), array (  '_controller' => 'Atomic\\MapBundle\\Controller\\MapController::showAction',));
            }

        }

        if (0 === strpos($pathinfo, '/shop')) {
            // atomic_shop_homepage
            if (rtrim($pathinfo, '/') === '/shop') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'atomic_shop_homepage');
                }

                return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\ShopController::indexAction',  '_route' => 'atomic_shop_homepage',);
            }

            // atomic_shop_exchanger
            if (rtrim($pathinfo, '/') === '/shop/exchanger') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'atomic_shop_exchanger');
                }

                return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\ShopController::exchangerAction',  '_route' => 'atomic_shop_exchanger',);
            }

            // atomic_interkassa_test
            if (rtrim($pathinfo, '/') === '/shop/test') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'atomic_interkassa_test');
                }

                return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\InterkassaController::payAction',  '_route' => 'atomic_interkassa_test',);
            }

            // atomic_interkassa_donut
            if ($pathinfo === '/shop/donut/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_atomic_interkassa_donut;
                }

                return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\InterkassaController::donutAction',  '_route' => 'atomic_interkassa_donut',);
            }
            not_atomic_interkassa_donut:

            if (0 === strpos($pathinfo, '/shop/buy')) {
                // atomic_shop_buyshishs
                if ($pathinfo === '/shop/buyshishs/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_atomic_shop_buyshishs;
                    }

                    return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\ShopController::buyshishsAction',  '_route' => 'atomic_shop_buyshishs',);
                }
                not_atomic_shop_buyshishs:

                // atomic_shop_buyrubles
                if ($pathinfo === '/shop/buyrubles/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_atomic_shop_buyrubles;
                    }

                    return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\ShopController::buyrublesAction',  '_route' => 'atomic_shop_buyrubles',);
                }
                not_atomic_shop_buyrubles:

            }

            // atomic_shop_success
            if ($pathinfo === '/shop/success/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_atomic_shop_success;
                }

                return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\InterkassaController::successAction',  '_route' => 'atomic_shop_success',);
            }
            not_atomic_shop_success:

            // atomic_shop_result
            if ($pathinfo === '/shop/result/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_atomic_shop_result;
                }

                return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\InterkassaController::resultAction',  '_route' => 'atomic_shop_result',);
            }
            not_atomic_shop_result:

            // atomic_shop_fail
            if ($pathinfo === '/shop/fail/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_atomic_shop_fail;
                }

                return array (  '_controller' => 'Atomic\\ShopBundle\\Controller\\InterkassaController::failAction',  '_route' => 'atomic_shop_fail',);
            }
            not_atomic_shop_fail:

        }

        if (0 === strpos($pathinfo, '/hello')) {
            // atomic_main_menu_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_main_menu_homepage')), array (  '_controller' => 'Atomic\\MainMenuBundle\\Controller\\DefaultController::indexAction',));
            }

            // atomic_server_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_server_homepage')), array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        if (0 === strpos($pathinfo, '/server')) {
            // atomic_server_list
            if (rtrim($pathinfo, '/') === '/server/list') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'atomic_server_list');
                }

                return array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\ServerController::indexAction',  '_route' => 'atomic_server_list',);
            }

            // atomic_server_new
            if (rtrim($pathinfo, '/') === '/server/new') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'atomic_server_new');
                }

                return array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\ServerController::newAction',  '_route' => 'atomic_server_new',);
            }

            // atomic_server_create
            if (rtrim($pathinfo, '/') === '/server/create') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'atomic_server_create');
                }

                return array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\ServerController::createAction',  '_route' => 'atomic_server_create',);
            }

            // atomic_server_show
            if (0 === strpos($pathinfo, '/server/show') && preg_match('#^/server/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_server_show')), array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\ServerController::showAction',));
            }

            // atomic_server_online_players
            if (0 === strpos($pathinfo, '/server/online-players') && preg_match('#^/server/online\\-players/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_server_online_players')), array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\CheckController::onlinePlayersAction',));
            }

            // atomic_server_edit
            if (0 === strpos($pathinfo, '/server/edit') && preg_match('#^/server/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_server_edit')), array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\ServerController::editAction',));
            }

            // atomic_server_delete
            if (0 === strpos($pathinfo, '/server/delete') && preg_match('#^/server/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_server_delete')), array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\ServerController::deleteAction',));
            }

            // atomic_server_update
            if (0 === strpos($pathinfo, '/server/update') && preg_match('#^/server/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_server_update')), array (  '_controller' => 'Atomic\\ServerBundle\\Controller\\ServerController::updateAction',));
            }

        }

        // atomic_user_list
        if (rtrim($pathinfo, '/') === '/users') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'atomic_user_list');
            }

            return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\UsersController::listAction',  '_route' => 'atomic_user_list',);
        }

        // atomic_user_profile
        if ($pathinfo === '/profile') {
            return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\UsersController::profileAction',  '_route' => 'atomic_user_profile',);
        }

        if (0 === strpos($pathinfo, '/user')) {
            // atomic_user_show
            if (0 === strpos($pathinfo, '/user/show') && preg_match('#^/user/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_user_show')), array (  '_controller' => 'Atomic\\UserBundle\\Controller\\UsersController::showAction',));
            }

            // atomic_change_status
            if (rtrim($pathinfo, '/') === '/user/change-status') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'atomic_change_status');
                }

                return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\PermissionController::changeStatusAction',  '_route' => 'atomic_change_status',);
            }

        }

        if (0 === strpos($pathinfo, '/tuning')) {
            // atomic_tuning
            if ($pathinfo === '/tuning') {
                return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\TuningController::indexAction',  '_route' => 'atomic_tuning',);
            }

            // atomic_tuning_uploadskin
            if ($pathinfo === '/tuning/uploadskin') {
                return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\TuningController::uploadSkinAction',  '_route' => 'atomic_tuning_uploadskin',);
            }

        }

        if (0 === strpos($pathinfo, '/boostrap')) {
            // AtomicFirstStartBundle_homepage
            if ($pathinfo === '/boostrap') {
                return array (  '_controller' => 'Atomic\\FastStartBundle\\Controller\\FaststartController::indexAction',  '_route' => 'AtomicFirstStartBundle_homepage',);
            }

            // AtomicFirstStartBundle_addstep
            if ($pathinfo === '/boostrap/addstep') {
                return array (  '_controller' => 'Atomic\\FastStartBundle\\Controller\\FaststartController::newAction',  '_route' => 'AtomicFirstStartBundle_addstep',);
            }

            // AtomicFirstStartBundle_delete_step
            if (0 === strpos($pathinfo, '/boostrap/delete-step') && preg_match('#^/boostrap/delete\\-step/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'AtomicFirstStartBundle_delete_step')), array (  '_controller' => 'Atomic\\FastStartBundle\\Controller\\FaststartController::deleteAction',));
            }

            // AtomicFirstStartBundle_create
            if ($pathinfo === '/boostrap/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_AtomicFirstStartBundle_create;
                }

                return array (  '_controller' => 'Atomic\\FastStartBundle\\Controller\\FaststartController::createAction',  '_route' => 'AtomicFirstStartBundle_create',);
            }
            not_AtomicFirstStartBundle_create:

            if (0 === strpos($pathinfo, '/boostrap/edit')) {
                // AtomicBlogBundle_faststart_edit
                if (preg_match('#^/boostrap/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'AtomicBlogBundle_faststart_edit')), array (  '_controller' => 'Atomic\\FastStartBundle\\Controller\\FaststartController::editAction',));
                }

                // AtomicBlogBundle_faststart_editsave
                if ($pathinfo === '/boostrap/edit/save') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_AtomicBlogBundle_faststart_editsave;
                    }

                    return array (  '_controller' => 'Atomic\\FastStartBundle\\Controller\\FaststartController::editSaveAction',  '_route' => 'AtomicBlogBundle_faststart_editsave',);
                }
                not_AtomicBlogBundle_faststart_editsave:

            }

        }

        // AtomicBlogBundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_AtomicBlogBundle_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'AtomicBlogBundle_homepage');
            }

            return array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\PageController::indexAction',  '_route' => 'AtomicBlogBundle_homepage',);
        }
        not_AtomicBlogBundle_homepage:

        if (0 === strpos($pathinfo, '/p')) {
            // atomic_blog_page
            if (0 === strpos($pathinfo, '/page') && preg_match('#^/page/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_atomic_blog_page;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_blog_page')), array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\PageController::pageAction',));
            }
            not_atomic_blog_page:

            if (0 === strpos($pathinfo, '/post')) {
                // atomic_blog_comment_page
                if (preg_match('#^/post/(?P<id>[^/]++)/page/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_atomic_blog_comment_page;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'atomic_blog_comment_page')), array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\BlogController::pageAction',));
                }
                not_atomic_blog_comment_page:

                // AtomicBlogBundle_blog_show
                if (preg_match('#^/post/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_AtomicBlogBundle_blog_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'AtomicBlogBundle_blog_show')), array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\BlogController::showAction',));
                }
                not_AtomicBlogBundle_blog_show:

            }

        }

        // AtomicBlogBundle_blog_new
        if (rtrim($pathinfo, '/') === '/newpost') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_AtomicBlogBundle_blog_new;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'AtomicBlogBundle_blog_new');
            }

            return array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\BlogController::newAction',  '_route' => 'AtomicBlogBundle_blog_new',);
        }
        not_AtomicBlogBundle_blog_new:

        if (0 === strpos($pathinfo, '/blog')) {
            // AtomicBlogBundle_blog_edit
            if (0 === strpos($pathinfo, '/blog/edit') && preg_match('#^/blog/edit/(?P<blog_id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'AtomicBlogBundle_blog_edit')), array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\BlogController::editAction',));
            }

            // AtomicBlogBundle_blog_edit_save
            if ($pathinfo === '/blog/saveedit/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_AtomicBlogBundle_blog_edit_save;
                }

                return array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\BlogController::editSaveAction',  '_route' => 'AtomicBlogBundle_blog_edit_save',);
            }
            not_AtomicBlogBundle_blog_edit_save:

        }

        // AtomicBlogBundle_blog_create
        if ($pathinfo === '/newpost/') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_AtomicBlogBundle_blog_create;
            }

            return array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\BlogController::createAction',  '_route' => 'AtomicBlogBundle_blog_create',);
        }
        not_AtomicBlogBundle_blog_create:

        // AtomicBlogBundle_blog_delete
        if (0 === strpos($pathinfo, '/delete') && preg_match('#^/delete/(?P<blog_id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AtomicBlogBundle_blog_delete')), array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\BlogController::deleteAction',));
        }

        // AtomicBlogBundle_comment_create
        if (0 === strpos($pathinfo, '/view/comment') && preg_match('#^/view/comment/(?P<blog_id>\\d+)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_AtomicBlogBundle_comment_create;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AtomicBlogBundle_comment_create')), array (  '_controller' => 'Atomic\\BlogBundle\\Controller\\CommentController::createAction',));
        }
        not_AtomicBlogBundle_comment_create:

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'Atomic\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'Atomic\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/group')) {
            // fos_user_group_list
            if ($pathinfo === '/group/list') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_list;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
            }
            not_fos_user_group_list:

            // fos_user_group_new
            if ($pathinfo === '/group/new') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
            }

            // fos_user_group_show
            if (preg_match('#^/group/(?P<groupName>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_show')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',));
            }
            not_fos_user_group_show:

            // fos_user_group_edit
            if (preg_match('#^/group/(?P<groupName>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_edit')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',));
            }

            // fos_user_group_delete
            if (preg_match('#^/group/(?P<groupName>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_delete')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',));
            }
            not_fos_user_group_delete:

        }

        // _imagine_blog_thumb
        if (0 === strpos($pathinfo, '/media/cache/blog_thumb') && preg_match('#^/media/cache/blog_thumb/(?P<path>.+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not__imagine_blog_thumb;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => '_imagine_blog_thumb')), array (  '_controller' => 'liip_imagine.controller:filterAction',  'filter' => 'blog_thumb',));
        }
        not__imagine_blog_thumb:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
