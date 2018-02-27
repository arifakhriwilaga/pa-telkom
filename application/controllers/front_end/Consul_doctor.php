<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consul_doctor extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    if ($user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		$page_title = "Konsul Dokter";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/consul_doctor/consul_doctor',$data);
	}
}