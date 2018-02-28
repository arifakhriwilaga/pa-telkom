<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_management extends CI_Controller {
	public $user;

	public function __construct() {
    parent::__construct();
    $this->user = $this->session->userdata('user');
    if (empty($this->user) || $this->user['level_user'] == 'user') {
    	redirect('/');
    }
  }

	public function index()	{
		$page_title = "Kelola Notifikasi";
		$data = array(
			'page_title' => $page_title,
			'user' => $this->user
		);

		$this->load->render('cms/notification/notification', $data);
	}
}
