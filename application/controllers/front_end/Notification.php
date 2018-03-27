<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('notifications','notifications');
    $user = $this->session->userdata('user');
    if ($user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		// var_dump($this->consul_doctor);exit();
		$page_title = "Notifikasi";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/user/notification',
			'_js' => 'assets/js/front_end/user/notification.js'
		);

		$this->load->view('front_end/base',$data);
	}

	public function detail()	{
		$page_title = "Notifikasi";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/user/detail_notification',
			'_js' => 'assets/js/front_end/user/detail_notification.js'
		);

		$this->load->view('front_end/base',$data);
	}
}