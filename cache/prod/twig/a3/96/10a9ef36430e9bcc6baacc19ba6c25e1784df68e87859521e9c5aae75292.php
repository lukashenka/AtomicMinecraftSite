<?php

/* ::base.html.twig */
class __TwigTemplate_a39610a9ef36430e9bcc6baacc19ba6c25e1784df68e87859521e9c5aae75292 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'stylesheets_additional' => array($this, 'block_stylesheets_additional'),
            'js_additional' => array($this, 'block_js_additional'),
            'navigation' => array($this, 'block_navigation'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "

<html>
    <head>

        <title>Atomic.im -> ";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "  </title>



        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

        ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo " 

         ";
        // line 19
        $this->displayBlock('stylesheets_additional', $context, $blocks);
        // line 20
        echo " 

        ";
        // line 22
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
        } else {
            // asset "1b37284"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1b37284") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/1b37284.js");
            // line 23
            echo "        <script type=\"text/javascript\" src=\"/js/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"/lib/bootstrap/js/bootstrap.min.js\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 26
        echo "
        ";
        // line 27
        $this->displayBlock('js_additional', $context, $blocks);
        // line 29
        echo "



    </head>
    <body>

        <div class=\"main-container container\">
            <header>

                <div id=\"header\">

                    <div class=\"row\">
                        <div class=\"col-lg-12\">
                            
                            <div id=\"header-left\" >
                               ";
        // line 45
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("AtomicUserBundle:Security:renderLogin"), array());
        // line 46
        echo "                                </div>


                                <div id=\"logo\">
                                    <img src=\"/img/atomic-logo.png\" alt=\"Atomic minecraft server\"/>
                                </div>

                            </div>

                        </div>

                    </div>

                </header>

                <div id=\"atomic-menu\">


               ";
        // line 64
        $this->displayBlock('navigation', $context, $blocks);
        // line 78
        echo "                        </div>

                    </div>
                    <div class=\"row\">
                        <div class=\"col-lg-12\">

                            <div class=\"col-lg-8\">
                                <div id=\"content\">
              ";
        // line 86
        $this->displayBlock('content', $context, $blocks);
        // line 87
        echo "
                                    </div>

                                </div>
                                <div class=\"col-lg-4\">
                                    <div id=\"right-column\">


                                        <div id=\"monitor\" class=\"blog-item\">
                                            <h4>Мониторинг</h4>
                                            ";
        // line 105
        echo "                                        </div>
                                        <p  style=\"font-size: 10px;text-align: center;\">  *ШиШ - игровая валюта </p>
                                    </div>

                                    <div id=\"last-users\" class=\"blog-item\">
                                        <h4>Новое пополнение</h4>
                                        <!--     <p>Адрес сервера - atomic.im</p>
                                           <p><a href=\"http://www.teamspeak.com/?page=downloads\" target=\"_blank\">Скачать teamspeak</a></p>
                                           <iframe width=\"280\" height=\"200\" src=\"//www.youtube.com/embed/QjJW3djOoEU\" frameborder=\"0\" allowfullscreen></iframe> -->
                                    ";
        // line 114
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("AtomicUserBundle:Users:lastUser"), array());
        echo " 
                                    </div>
                                           ";
        // line 128
        echo "
                                </div>
                            </div>

                        </div>







                        <footer>

                            <div id=\"footer\">

                                <div class=\"left-column\">
                                    <div class=\"item\">
                                        <!-- begin WebMoney Transfer : accept label -->
                                        <a href=\"http://www.megastock.ru/\" target=\"_blank\"><img src=\"/img/acc_white_on_transp_ru.png\" alt=\"www.megastock.ru\" border=\"0\"></a>
                                    </div>

                                    <div class=\"item\">
                                        <!-- begin WebMoney Transfer : attestation label -->
                                        <a href=\"https://passport.webmoney.ru/asp/certview.asp?wmid=224394073004\" target=\"_blank\"><img src=\"/img/v_white_on_transp_ru.png\" alt=\"Здесь находится аттестат нашего WM идентификатора 224394073004\" border=\"0\" /></a>
                                        <!-- end WebMoney Transfer : attestation label -->

                                    </div>
                                    <div class=\"item\"><a href=\"http://interkassa.com/\" target=\"_blank\">
                                            <img src=\"/img/ik_88x31_01.gif\" title=\"Платежная система обслуживается компанией INTERKASSA\" border=\"0\">
                                        </a>
                                    </div>

                                    <div class=\"item\">
                                        <!-- Yandex.Metrika counter -->
                                        <script type=\"text/javascript\">
                                            (function(d, w, c) {
                                                (w[c] = w[c] || []).push(function() {
                                                    try {
                                                        w.yaCounter22651156 = new Ya.Metrika({id: 22651156,
                                                            webvisor: true,
                                                            clickmap: true,
                                                            trackLinks: true,
                                                            accurateTrackBounce: true});
                                                    } catch (e) {
                                                    }
                                                });

                                                var n = d.getElementsByTagName(\"script\")[0],
                                                        s = d.createElement(\"script\"),
                                                        f = function() {
                                                    n.parentNode.insertBefore(s, n);
                                                };
                                                s.type = \"text/javascript\";
                                                s.async = true;
                                                s.src = (d.location.protocol == \"https:\" ? \"https:\" : \"http:\") + \"//mc.yandex.ru/metrika/watch.js\";

                                                if (w.opera == \"[object Opera]\") {
                                                    d.addEventListener(\"DOMContentLoaded\", f, false);
                                                } else {
                                                    f();
                                                }
                                            })(document, window, \"yandex_metrika_callbacks\");
                                            </script>
                                            <noscript><div><img src=\"//mc.yandex.ru/watch/22651156\" style=\"position:absolute; left:-9999px;\" alt=\"\" /></div></noscript>
                                            <!-- /Yandex.Metrika counter -->
                                        </div>

                                    </div>
                                    <!-- end WebMoney Transfer : accept label -->
                                    <p>&copy; Atomic Minecraft Server 2013</p>
                                    <address>
                                        <p> Связаться с нами:    
                                            <a href=\"mailto:support@atomic.im\">support@atomic.im</a></p>
                                    </address>
                                </div>

                            </footer>
                        </div>
                        <script>
                            (function(i, s, o, g, r, a, m) {
                                i['GoogleAnalyticsObject'] = r;
                                i[r] = i[r] || function() {
                                    (i[r].q = i[r].q || []).push(arguments)
                                }, i[r].l = 1 * new Date();
                                a = s.createElement(o),
                                        m = s.getElementsByTagName(o)[0];
                                a.async = 1;
                                a.src = g;
                                m.parentNode.insertBefore(a, m)
                            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                            ga('create', 'UA-45016713-1', 'atomic.im');
                            ga('send', 'pageview');

                            </script>
                        </body>
                    </html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo " Minecraft сервер ";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 13
        echo "
        <link rel=\"stylesheet\" href=\"/lib/bootstrap/css/bootstrap.min.css\">
        <link rel=\"stylesheet\" href=\"/css/layout.css\">
        <link rel=\"stylesheet\" href=\"/css/style.css\">
         ";
    }

    // line 19
    public function block_stylesheets_additional($context, array $blocks = array())
    {
        // line 20
        echo "         ";
    }

    // line 27
    public function block_js_additional($context, array $blocks = array())
    {
        // line 28
        echo "        ";
    }

    // line 64
    public function block_navigation($context, array $blocks = array())
    {
        // line 65
        echo "                    <div class=\"navbar\">

                        <div class=\"navbar-collapse collapse\">

                            <ul class=\"nav navbar-nav\">
                                 ";
        // line 70
        if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("AtomicMainMenuBundle:Menu:show", array("currentRoute" => $this->getAttribute($this->getAttribute($this->getAttribute($_app_, "request"), "attributes"), "get", array(0 => "_route"), "method"))), array());
        // line 71
        echo "


                                </ul>

                            </div><!--/.navbar-collapse -->
                ";
    }

    // line 86
    public function block_content($context, array $blocks = array())
    {
        echo " content ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  306 => 86,  296 => 71,  293 => 70,  286 => 65,  283 => 64,  279 => 28,  276 => 27,  272 => 20,  269 => 19,  261 => 13,  258 => 12,  252 => 6,  151 => 128,  146 => 114,  135 => 105,  123 => 87,  121 => 86,  111 => 78,  109 => 64,  89 => 46,  87 => 45,  69 => 29,  67 => 27,  58 => 23,  53 => 22,  49 => 20,  47 => 19,  43 => 17,  41 => 12,  32 => 6,  25 => 1,  120 => 33,  115 => 31,  108 => 27,  102 => 25,  98 => 24,  92 => 22,  88 => 21,  85 => 20,  78 => 18,  75 => 17,  70 => 14,  64 => 26,  54 => 10,  48 => 9,  42 => 8,  37 => 7,  34 => 6,  31 => 4,  28 => 3,);
    }
}
