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
	
	public function info()	{
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
}
