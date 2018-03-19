<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    if ($user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		$page_title = "Home";

		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/home',
			'_contact' => true,
			'_js' => 'assets/js/front_end/home/home.js'
		);

		$this->load->view('front_end/base',$data);
	}
}
