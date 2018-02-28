<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    if ($user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		$page_title = "Notifikasi";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/user/notification',$data);
	}
}