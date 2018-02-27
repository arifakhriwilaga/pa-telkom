<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Healty_info extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    if ($user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		$page_title = "Info Sehat";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/healthy_info',$data);
	}
}
