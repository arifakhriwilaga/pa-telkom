<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
    parent::__construct();
		// $base = $this->load->library('Base');
  }

	public function index()	{
		$page_title = "Home";

		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/index',$data);
	}
	
	public function healthy_info()	{
		$page_title = "Info Sehat";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/guest/healthy_info/healthy_info',$data);
	}

	public function check_step_1() {
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/guest/check/step_1_form_check',$data);
	}

	public function check_step_2() {
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/guest/check/step_2_form_check',$data);
	}

	public function check_step_final() {
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/guest/check/step_final_form_check',$data);
	}

	public function visit() {
		$page_title = "Kunjungan";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/auth/visit/visit',$data);
	}

	public function consul_doctor() {
		$page_title = "Konsul Dokter";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/auth/consul_doctor/consul_doctor',$data);
	}

	public function notification() {
		$page_title = "Notifikasi";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/auth/user/notification',$data);
	}
}
