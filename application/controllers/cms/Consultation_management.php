<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consultation_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        if (empty($user) || $user['level_user'] == 'user') {
            redirect('/');
        }
    }

    public function index() {
        $page_title = "Konsultasi";

        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/consultation/consultation',
            '_js' => 'assets/js/cms/consultation/consultation.js'
        );

        $this->load->view('cms/base', $data);
    }

    public function detail_consul() {
        $page_title = "Detail Konsultasi";

        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/consultation/detail_consultation',
            '_js' => 'assets/js/cms/consultation/detail_consultation.js'
        );

        $this->load->view('cms/base', $data);
    }

}
