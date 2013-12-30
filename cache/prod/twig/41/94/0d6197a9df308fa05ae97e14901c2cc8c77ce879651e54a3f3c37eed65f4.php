<?php

/* AtomicBlogBundle::layout.html.twig */
class __TwigTemplate_41940d6197a9df308fa05ae97e14901c2cc8c77ce879651e54a3f3c37eed65f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "AtomicBlogBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 13,  107 => 11,  103 => 10,  97 => 6,  94 => 5,  85 => 39,  76 => 34,  71 => 33,  66 => 32,  59 => 31,  39 => 18,  35 => 16,  32 => 5,  29 => 4,);
    }
}
