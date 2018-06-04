<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_notifikasi extends CI_Controller {
    var $user;
    public function __construct() {
        parent::__construct();
        $this->load->model('m_notifikasi', 'notifications');
        $this->user = $this->session->userdata('user');
        if ($this->user['level_user'] == 'admin') {
            redirect('dasbor');
        }
    }

    public function index() {
        $page_title = "Notifikasi";
        $notifications = $this->notifications->get_all($this->user['id_user']);
        $data = array(
            'page_title' => $page_title,
            'notifications' => $notifications,
            '_content' => 'front_end/pengguna/v_notifikasi',
            '_css' => 'assets/css/front_end/pengguna/notifikasi.css',
            '_js' => 'assets/js/front_end/pengguna/notifikasi.js'
        );

        $this->load->view('front_end/v_base', $data);
    }

    public function detail($id) {
        $page_title = "Notifikasi";
        $this->notifications->read_notif($id);
        $notif = $this->notifications->detail($id);
        $data = array(
            'page_title' => $page_title,
            'notif' => $notif[0],
            '_content' => 'front_end/pengguna/v_detail_notifikasi',
            '_css' => 'assets/css/front_end/pengguna/detail_notifikasi.css',
            '_js' => 'assets/js/front_end/pengguna/detail_notifikasi.js'
        );

        $this->load->view('front_end/v_base', $data);
    }
    
    public function count_notif() {
        $user_id = $this->input->post('user_id');
        $result = $this->notifications->count_notif($user_id);
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

}
