<?php

class Twig
{

    private $twig;

    public function render($path, $filename, $vars = array(), $return = false)
    {
        $loader = new Twig_Loader_Filesystem($path);
        $this->twig = new Twig_Environment($loader);

        // extend twig function
        $this->extendFunctions();

        $result = $this->twig->render($filename, $vars);

        if ($return) {
            return $result;
        }

        echo $result;
    }

    public function extendFunctions()
    {
        $this->twig->addFunction(new Twig_SimpleFunction('function', array($this, 'exec_function')));
        $this->twig->addFunction(new Twig_SimpleFunction('fn', array($this, 'exec_function')));
        $this->twig->addFunction(new Twig_SimpleFunction('session', array($this, 'exec_session')));
        $this->twig->addFunction(new Twig_SimpleFunction('flashdata', array($this, 'exec_flashdata')));
    }

    public function exec_function($function_name)
    {
        $args = func_get_args();
        array_shift($args);
        if (is_string($function_name)) {
            $function_name = trim($function_name);
        }
        return call_user_func_array($function_name, ($args));
    }

    public function exec_session($user_data) 
    {
        $ci = get_instance();
        return $ci->session->userdata($user_data);
    }

    public function exec_flashdata($status) 
    {
        $ci = get_instance();
        return $ci->session->flashdata($status);
    }
}