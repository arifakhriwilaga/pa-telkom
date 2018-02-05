<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

abstract class Widgets extends CI_Controller {

    private $_data;

    public function __construct() {
        parent::__construct();
        $this->_data = array();
    }

    abstract protected function prepare();

    /**
     * Assign variable to view
     * @param string|mixed $arg1
     * @param string|mixed $args2
     */
    protected function assign($arg1, $args2 = NULL) {
        if (is_array($arg1)) {
            $this->_data = $arg1;
        } else {
            $this->_data[$arg1] = $args2;
        }
    }

    protected function render() {
        $widget_name = $this->router->fetch_widget();
        $css_widget = "assets/widgets/{$widget_name}/style.min.css";
        $js_widget = "assets/widgets/{$widget_name}/script.min.js";
        if (file_exists($css_widget)) {
            $json['css'] = $css_widget . "?_ver=" . md5_file($css_widget);
        }
        if (file_exists($js_widget)) {
            $this->_data['js_widget'] = base_url($js_widget . "?_ver=" . md5_file($js_widget));
        }
        $prefix = chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . "_";
        $this->_data['widget_id'] = uniqid($prefix);
        $json['html'] = $this->load->render_widget($this->_data, TRUE);

        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($json));
    }

    public function index() {
        $this->prepare();
        $this->render();
    }

}
