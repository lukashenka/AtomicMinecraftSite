<?php

/* LiipImagineBundle:Form:form_div_layout.html.twig */
class __TwigTemplate_170667c6ed6846303d0d5c6c9f7b7320cd4e4c783818ac6504a96d698ea46163 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'liip_imagine_image_widget' => array($this, 'block_liip_imagine_image_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('liip_imagine_image_widget', $context, $blocks);
    }

    public function block_liip_imagine_image_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        ";
        if (isset($context["image_path"])) { $_image_path_ = $context["image_path"]; } else { $_image_path_ = null; }
        if ($_image_path_) {
            // line 4
            echo "            <div>
                ";
            // line 5
            if (isset($context["link_url"])) { $_link_url_ = $context["link_url"]; } else { $_link_url_ = null; }
            if ($_link_url_) {
                // line 6
                echo "                    <a href=\"";
                if (isset($context["link_filter"])) { $_link_filter_ = $context["link_filter"]; } else { $_link_filter_ = null; }
                if (isset($context["link_url"])) { $_link_url_ = $context["link_url"]; } else { $_link_url_ = null; }
                echo twig_escape_filter($this->env, (($_link_filter_) ? ($this->env->getExtension('liip_imagine')->filter($_link_url_, $_link_filter_)) : ($_link_url_)), "html", null, true);
                echo "\" ";
                if (isset($context["link_attr"])) { $_link_attr_ = $context["link_attr"]; } else { $_link_attr_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($_link_attr_);
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    if (isset($context["attrname"])) { $_attrname_ = $context["attrname"]; } else { $_attrname_ = null; }
                    echo twig_escape_filter($this->env, $_attrname_, "html", null, true);
                    echo "=\"";
                    if (isset($context["attrvalue"])) { $_attrvalue_ = $context["attrvalue"]; } else { $_attrvalue_ = null; }
                    echo twig_escape_filter($this->env, $_attrvalue_, "html", null, true);
                    echo "\" ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
                ";
            }
            // line 8
            echo "
                <img src=\"";
            // line 9
            if (isset($context["image_path"])) { $_image_path_ = $context["image_path"]; } else { $_image_path_ = null; }
            if (isset($context["image_filter"])) { $_image_filter_ = $context["image_filter"]; } else { $_image_filter_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter($_image_path_, $_image_filter_), "html", null, true);
            echo "\" ";
            if (isset($context["image_attr"])) { $_image_attr_ = $context["image_attr"]; } else { $_image_attr_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_image_attr_);
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                if (isset($context["attrname"])) { $_attrname_ = $context["attrname"]; } else { $_attrname_ = null; }
                echo twig_escape_filter($this->env, $_attrname_, "html", null, true);
                echo "=\"";
                if (isset($context["attrvalue"])) { $_attrvalue_ = $context["attrvalue"]; } else { $_attrvalue_ = null; }
                echo twig_escape_filter($this->env, $_attrvalue_, "html", null, true);
                echo "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo " />

                ";
            // line 11
            if (isset($context["link_url"])) { $_link_url_ = $context["link_url"]; } else { $_link_url_ = null; }
            if ($_link_url_) {
                // line 12
                echo "                    </a>
                ";
            }
            // line 14
            echo "            </div>
        ";
        }
        // line 16
        echo "
        ";
        // line 17
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "LiipImagineBundle:Form:form_div_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  101 => 17,  98 => 16,  90 => 12,  87 => 11,  65 => 9,  62 => 8,  36 => 5,  33 => 4,  26 => 2,  20 => 1,  123 => 13,  107 => 11,  103 => 10,  97 => 6,  94 => 14,  85 => 39,  76 => 34,  71 => 33,  66 => 32,  59 => 31,  39 => 6,  35 => 16,  32 => 5,  29 => 3,);
    }
}
