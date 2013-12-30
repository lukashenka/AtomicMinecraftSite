<?php

/* AtomicMainMenuBundle:Menu:index.html.twig */
class __TwigTemplate_875559cde0b35988436df068429e80f369456b41aa08cc0989d7b0a7f5fe0157 extends Twig_Template
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
        echo "<ul class=\"nav navbar-nav\">

";
        // line 3
        if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_menu_);
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 4
            echo "
    ";
            // line 5
            if (isset($context["currentRoute"])) { $_currentRoute_ = $context["currentRoute"]; } else { $_currentRoute_ = null; }
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            if (($_currentRoute_ == $this->getAttribute($_item_, "route"))) {
                // line 6
                echo "       ";
                $context["class"] = "active";
            } else {
                // line 8
                echo " ";
                $context["class"] = "";
                // line 9
                echo "    ";
            }
            // line 10
            echo "
    <li class=\"";
            // line 11
            if (isset($context["class"])) { $_class_ = $context["class"]; } else { $_class_ = null; }
            echo twig_escape_filter($this->env, $_class_, "html", null, true);
            echo "\"><a href=\"
";
            // line 12
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            if ((twig_length_filter($this->env, $this->getAttribute($_item_, "route")) > 1)) {
                // line 13
                echo "    ";
                if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
                echo $this->env->getExtension('routing')->getPath($this->getAttribute($_item_, "route"));
                echo "

       ";
            } else {
                // line 16
                echo "
        ";
                // line 17
                if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_item_, "exlink"), "html", null, true);
                echo "

        ";
            }
            // line 20
            echo "

           \">";
            // line 22
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "</a></li>


";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 26
            echo "           No menu! WHAT??? oO
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        </ul>";
    }

    public function getTemplateName()
    {
        return "AtomicMainMenuBundle:Menu:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 28,  79 => 22,  68 => 17,  65 => 16,  57 => 13,  46 => 10,  40 => 8,  36 => 6,  23 => 3,  71 => 27,  66 => 26,  61 => 24,  50 => 15,  45 => 13,  39 => 11,  29 => 4,  27 => 6,  22 => 3,  19 => 1,  306 => 86,  296 => 71,  293 => 70,  286 => 65,  283 => 64,  279 => 28,  276 => 27,  272 => 20,  269 => 19,  261 => 13,  258 => 12,  252 => 6,  151 => 128,  146 => 114,  135 => 105,  123 => 87,  121 => 86,  111 => 78,  109 => 64,  89 => 26,  87 => 45,  69 => 29,  67 => 27,  58 => 23,  53 => 22,  49 => 11,  47 => 19,  43 => 9,  41 => 12,  32 => 5,  25 => 1,  120 => 33,  115 => 31,  108 => 27,  102 => 25,  98 => 24,  92 => 22,  88 => 21,  85 => 20,  78 => 30,  75 => 20,  70 => 14,  64 => 25,  54 => 12,  48 => 9,  42 => 8,  37 => 7,  34 => 6,  31 => 4,  28 => 3,);
    }
}
