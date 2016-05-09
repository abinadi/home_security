<?php

namespace Security\Smarty;

use Smarty;

class SmartyWrapper
{
    /**
     * The smarty object
     * 
     * @var Smarty
     */
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty;
        
        $this->smarty->debugging = false;
        $this->smarty->caching = false;
        $this->smarty->cache_lifetime = 120;
        $this->smarty->setTemplateDir(app_dir() . '/smarty/templates');
        $this->smarty->setCompileDir(app_dir() . '/smarty/templates_c');
        $this->smarty->setConfigDir(app_dir() . '/smarty/configs');
        $this->smarty->setCacheDir(app_dir() . '/smarty/cache');
    }

    /**
     * @param $template
     */
    public function render($template, $data = [])
    {
        foreach($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }
        
        $this->smarty->display($template . '.tpl');
    }
}