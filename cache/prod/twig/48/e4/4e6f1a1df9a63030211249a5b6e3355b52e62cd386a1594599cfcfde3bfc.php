<?php

/* AtomicUserBundle:Security:login.raw.html.twig */
class __TwigTemplate_48e44e6f1a1df9a63030211249a5b6e3355b52e62cd386a1594599cfcfde3bfc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 3
        echo "

<div id=\"profile-inf-small\">
";
        // line 6
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 7
            echo "        <div>
            <span class=\"bold greeting\">Приветсвуем Вас, </span><span class=\"username\">";
            // line 8
            if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_app_, "user"), "username"), "html", null, true);
            echo "</span>
        </div>
        <div>
            <span class=\"bold\">У вас на счету </span><span class=\"coins-count\"><strong>";
            // line 11
            if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_app_, "user"), "coins"), "html", null, true);
            echo "</strong> рублей</span>  
        </div>
        <div><a href=\"";
            // line 13
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">[Выйти]</a></div>
";
        } else {
            // line 15
            echo "
        <a href=\"/register\"><img src=\"/img/register.png\" alt=\"Регистрация\"/></a>
        <a href=\"/register\"><span style=\"
                                  font-size: 18px;
                                  margin-left: 16px;

                                  \">[Регистрация]</span></a>

    ";
        }
        // line 24
        echo "            </div>
";
        // line 25
        if ((!$this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED"))) {
            // line 26
            echo "            <form action=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
            echo "\" method=\"post\" id=\"sign-in\" class=\"navbar-form\">
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 27
            if (isset($context["csrf_token"])) { $_csrf_token_ = $context["csrf_token"]; } else { $_csrf_token_ = null; }
            echo twig_escape_filter($this->env, $_csrf_token_, "html", null, true);
            echo "\" />
                <div class=\"form-group\">

                    <input type=\"text\" class=\"form-control atomic-input first\" id=\"username\" name=\"_username\" value=\"";
            // line 30
            if (isset($context["last_username"])) { $_last_username_ = $context["last_username"]; } else { $_last_username_ = null; }
            echo twig_escape_filter($this->env, $_last_username_, "html", null, true);
            echo "\" placeholder=\"Имя || email\" required=\"required\" />
                </div>
                <div class=\"form-group\">

                    <input type=\"password\" class=\"form-control atomic-input first\" id=\"password\" name=\"_password\" placeholder=\"Пароль\" required=\"required\" />
                </div>
                <div class=\"form-group\">
                    <input type=\"submit\" class=\"btn loginbutton\" id=\"_submit\" name=\"_submit\" value=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
            echo "\" />
                </div>
            </form>
";
        }
    }

    public function getTemplateName()
    {
        return "AtomicUserBundle:Security:login.raw.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 27,  66 => 26,  61 => 24,  50 => 15,  45 => 13,  39 => 11,  29 => 7,  27 => 6,  22 => 3,  19 => 1,  306 => 86,  296 => 71,  293 => 70,  286 => 65,  283 => 64,  279 => 28,  276 => 27,  272 => 20,  269 => 19,  261 => 13,  258 => 12,  252 => 6,  151 => 128,  146 => 114,  135 => 105,  123 => 87,  121 => 86,  111 => 78,  109 => 64,  89 => 37,  87 => 45,  69 => 29,  67 => 27,  58 => 23,  53 => 22,  49 => 20,  47 => 19,  43 => 17,  41 => 12,  32 => 8,  25 => 1,  120 => 33,  115 => 31,  108 => 27,  102 => 25,  98 => 24,  92 => 22,  88 => 21,  85 => 20,  78 => 30,  75 => 17,  70 => 14,  64 => 25,  54 => 10,  48 => 9,  42 => 8,  37 => 7,  34 => 6,  31 => 4,  28 => 3,);
    }
}
