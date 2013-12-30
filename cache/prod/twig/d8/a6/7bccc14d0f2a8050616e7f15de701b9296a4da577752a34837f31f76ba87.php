<?php

/* AtomicUserBundle:Users:lastest.html.twig */
class __TwigTemplate_d8a67bccc14d0f2a8050616e7f15de701b9296a4da577752a34837f31f76ba87 extends Twig_Template
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
        echo "<div class=\"new-users\">
    <div class=\"new-user register-your-motherfuckin-bitch\">
        <a href=\"/register\">Попасть сюда</a>
    </div>
";
        // line 5
        if (isset($context["users"])) { $_users_ = $context["users"]; } else { $_users_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_users_);
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 6
            echo "
    <div class=\"new-user\">";
            // line 7
            if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_user_, "getUsername"), "html", null, true);
            echo "</div>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "


</div>
";
    }

    public function getTemplateName()
    {
        return "AtomicUserBundle:Users:lastest.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 7,  30 => 6,  96 => 28,  79 => 22,  68 => 17,  65 => 16,  57 => 13,  46 => 10,  40 => 8,  36 => 6,  23 => 3,  71 => 27,  66 => 26,  61 => 24,  50 => 15,  45 => 13,  39 => 11,  29 => 4,  27 => 6,  22 => 3,  19 => 1,  306 => 86,  296 => 71,  293 => 70,  286 => 65,  283 => 64,  279 => 28,  276 => 27,  272 => 20,  269 => 19,  261 => 13,  258 => 12,  252 => 6,  151 => 128,  146 => 114,  135 => 105,  123 => 87,  121 => 86,  111 => 78,  109 => 64,  89 => 26,  87 => 45,  69 => 29,  67 => 27,  58 => 23,  53 => 22,  49 => 11,  47 => 19,  43 => 10,  41 => 12,  32 => 5,  25 => 5,  120 => 33,  115 => 31,  108 => 27,  102 => 25,  98 => 24,  92 => 22,  88 => 21,  85 => 20,  78 => 30,  75 => 20,  70 => 14,  64 => 25,  54 => 12,  48 => 9,  42 => 8,  37 => 7,  34 => 6,  31 => 4,  28 => 3,);
    }
}
