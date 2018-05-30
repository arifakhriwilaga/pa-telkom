<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_konsultasi_manajemen extends CI_Controller {

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
            '_content' => 'cms/konsultasi/v_konsultasi',
            '_js' => 'assets/js/cms/konsultasi/konsultasi.js'
        );

        $this->load->view('cms/base', $data);
    }

    public function detail_consul() {
        $page_title = "Detail Konsultasi";

        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/konsultasi/detail_konsultasi',
            '_js' => 'assets/js/cms/konsultasi/detail_konsultasi.js'
        );

        $this->load->view('cms/base', $data);
    }

}
