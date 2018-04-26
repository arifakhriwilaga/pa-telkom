<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
    var $user;
    public function __construct() {
        parent::__construct();
        $this->load->model('notifications', 'notifications');
        $this->user = $this->session->userdata('user');
        if ($this->user['level_user'] == 'admin') {
            redirect('dasbor');
        }
    }

    public function index() {
        $page_title = "Notifikasi";
        $notifications = $this->notifications->get_all($this->user['user_id']);
        $data = array(
            'page_title' => $page_title,
            'notifications' => $notifications,
            '_content' => 'front_end/user/notification',
            '_css' => 'assets/css/front_end/user/notification.css',
            '_js' => 'assets/js/front_end/user/notification.js'
        );

        $this->load->view('front_end/base', $data);
    }

    public function detail($id) {
        $page_title = "Notifikasi";
        $this->notifications->read_notif($id);
        $notif = $this->notifications->detail($id);
        $data = array(
            'page_title' => $page_title,
            'notif' => $notif[0],
            '_content' => 'front_end/user/detail_notification',
            '_css' => 'assets/css/front_end/user/detail_notification.css',
            '_js' => 'assets/js/front_end/user/detail_notification.js'
        );

        $this->load->view('front_end/base', $data);
    }
    
    public function count_notif() {
        $user_id = $this->input->post('user_id');
        $result = $this->notifications->count_notif($user_id);
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

}
