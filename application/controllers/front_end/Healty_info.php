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

	public function detail1()	{
		$page_title = "13 Tips Makan Sehat untuk Orang Sibuk";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info1',$data);
	}

	public function detail2()	{
		$page_title = "Terlalu Sering Makan Daging Bisa Kena Diabetes, Kok Bisa?";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info2',$data);
	}
}
