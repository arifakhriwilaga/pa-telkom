<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }

	public function index()	{
		$page_title = "Home";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/index');
	}
	
	public function healthy_info()	{
		$page_title = "Info Kesehatan";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/healthy_info');
	}

	public function visit() {
		$page_title = "Visit";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/visit');
	}

	public function check_step_1() {
		$page_title = "Periksa | Step 1";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/step_1_form_check');
	}

	public function check_step_2() {
		$page_title = "Periksa | Step 2";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/step_2_form_check');
	}

	public function check_step_final() {
		$page_title = "Periksa | Step Final";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/step_final_form_check');
	}

	public function consul_doctor() {
		$page_title = "Konsul Dokter";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/consul_doctor');
	}
}
