<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultation_management extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    if (empty($user) || $user['level_user'] == 'user') {
    	redirect('/');
    }
  }

	public function index()	{
		$page_title = "Konsultasi";

		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('cms/consultation/consultation', $data);
	}
	
	public function detail_consul()	{
		$page_title = "Detail Konsultasi";
		
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('cms/consultation/detail_consultation', $data);
	}
	
	public function detail_history()	{
		$page_title = "Cetak Riwayat";
		
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('cms/consultation/print_history', $data);
	}
}
