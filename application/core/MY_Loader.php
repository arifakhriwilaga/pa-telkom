<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH . "third_party/MX/Loader.php";

class MY_Loader extends MX_Loader
{

    public function render($view, $vars = array(), $return = FALSE)
    {
        $_ci_file = (pathinfo($view, PATHINFO_EXTENSION)) ? $view : $view . '.twig';
        
        list($path, $_view) = Modules::find($_ci_file, $this->_module, 'views/');
        
        if ($path != FALSE) {
            $this->_ci_view_paths = array($path => TRUE) + $this->_ci_view_paths;
            $_ci_file = $_view;
        }

        $_ci_path = array_keys($this->_ci_view_paths);

        if (empty($_ci_path)) {
            show_error('Unable to load the requested file: ' . $_ci_file);
        }

        if (isset($vars)) {
            $this->_ci_cached_vars = array_merge($this->_ci_cached_vars, (array) $vars);
        }
        // print_r($_ci_path);
        // print_r($_ci_file);
        // print_r($this->_ci_cached_vars);
        // print_r($return);
        return $this->twig->render($_ci_path, $_ci_file, $this->_ci_cached_vars, $return);
    }
    
    function render_widget($vars = array(), $return = FALSE) {
        $directory = preg_replace('/^[^\/]*\//', '', CI::$APP->router->directory);
        $this->_ci_view_paths = array_merge(array(APPPATH . $directory => TRUE), $this->_ci_view_paths);
        $_ci_path = array_keys($this->_ci_view_paths);
        if (empty($_ci_path)) {
            show_error('Unable to load the requested file: view.twig');
        }

        if (isset($vars)) {
            $this->_ci_cached_vars = array_merge($this->_ci_cached_vars, (array) $vars);
        }
        
        return $this->twig->render($_ci_path, 'view.twig', $this->_ci_cached_vars, $return);
    }

}
