<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    if ($user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/check/step_1_form_check',$data);
	}

	public function check_step_2() {
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/check/step_2_form_check',$data);
	}

	public function check_step_final() {
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/check/step_final_form_check',$data);
	}
}
