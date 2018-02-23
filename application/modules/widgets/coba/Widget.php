<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends Widgets {

    protected function prepare() {
        session_write_close();
        $page = $this->input->get('page');
        
        $data = array(
            'page' => $page
        );
        $this->assign($data);
    }

}
