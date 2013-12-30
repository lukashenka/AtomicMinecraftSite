<?php

/* AtomicUserBundle:Tuning:index.html.twig */
class __TwigTemplate_0dc8fddedb9fc2be532bb35755e0062b94e89e0744a00e9ae5e702b0f2481a0f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AtomicBlogBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'js_additional' => array($this, 'block_js_additional'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AtomicBlogBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo " ";
        $this->displayBlock('js_additional', $context, $blocks);
        // line 16
        echo "<script type=\"text/javascript\">
    \$(document).load(function() {
        drawSteve(document.getElementById('steve'), \"";
        // line 18
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_user_, "username"), "html", null, true);
        echo "\", \"/";
        if (isset($context["skin"])) { $_skin_ = $context["skin"]; } else { $_skin_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_skin_, "getUploadDir"), "html", null, true);
        echo "\");
    }
    );
    </script>

    <div class=\"blog-item\">
        <h3>Это вы</h3>
        <div id=\"steve\"></div>

    </div>
    <div class=\"blog-item\">

        <h3>Изменить скин</h3>
        <form action=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("atomic_tuning_uploadskin");
        echo "\" ";
        if (isset($context["form_skin"])) { $_form_skin_ = $context["form_skin"]; } else { $_form_skin_ = null; }
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($_form_skin_, 'enctype');
        echo " method=\"POST\">
         ";
        // line 32
        if (isset($context["form_skin"])) { $_form_skin_ = $context["form_skin"]; } else { $_form_skin_ = null; }
        echo         $this->env->getExtension('form')->renderer->renderBlock($_form_skin_, 'form_start');
        echo "
         ";
        // line 33
        if (isset($context["form_skin"])) { $_form_skin_ = $context["form_skin"]; } else { $_form_skin_ = null; }
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($_form_skin_, 'errors');
        echo "
         ";
        // line 34
        if (isset($context["form_skin"])) { $_form_skin_ = $context["form_skin"]; } else { $_form_skin_ = null; }
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($_form_skin_, "file"), 'row', array("attr" => array("class" => "form-control")));
        echo "

                <div>
                    <input type=\"submit\" class=\"btn btn-default\" value=\"Обновить\" />
                </div>
        ";
        // line 39
        if (isset($context["form_skin"])) { $_form_skin_ = $context["form_skin"]; } else { $_form_skin_ = null; }
        echo         $this->env->getExtension('form')->renderer->renderBlock($_form_skin_, 'form_end');
        echo "
            </form>
        </div>
";
    }

    // line 5
    public function block_js_additional($context, array $blocks = array())
    {
        // line 6
        echo "<script src=\"/js/jquery.min.js\"></script>
<script src=\"/lib/minecraft/Three.js\"></script>
<script src=\"/lib/minecraft/RequestAnimationFrame.js\"></script>

";
        // line 10
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f3f271f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f3f271f_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/f3f271f_part_1_steve3D_1.js");
            // line 11
            echo "<script type=\"text/javascript\" src=\"";
            if (isset($context["asset_url"])) { $_asset_url_ = $context["asset_url"]; } else { $_asset_url_ = null; }
            echo twig_escape_filter($this->env, $_asset_url_, "html", null, true);
            echo "\"\"></script>
";
        } else {
            // asset "f3f271f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f3f271f") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/f3f271f.js");
            echo "<script type=\"text/javascript\" src=\"";
            if (isset($context["asset_url"])) { $_asset_url_ = $context["asset_url"]; } else { $_asset_url_ = null; }
            echo twig_escape_filter($this->env, $_asset_url_, "html", null, true);
            echo "\"\"></script>
";
        }
        unset($context["asset_url"]);
        // line 13
        echo "

";
    }

    public function getTemplateName()
    {
        return "AtomicUserBundle:Tuning:index.html.twig";
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
