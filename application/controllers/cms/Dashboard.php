<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    if (empty($user) || $user['level_user'] == 'user') {
    	redirect('/');
    }
  }

	public function index()	{
		$page_title = "Dasbor";

		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('cms/dashboard/dashboard', $data);
	}
}
