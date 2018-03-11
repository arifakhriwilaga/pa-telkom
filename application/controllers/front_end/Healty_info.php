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

	public function detail3()	{
		$page_title = "Mengenal Asam Amino, Fungsinya Bagi Tubuh dan Sumber Makanannya";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info3',$data);
	}

	public function detail4()	{
		$page_title = "5 Resep Brunch Lezat, Buat Anda yang Suka Sarapan Siang-Siang";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info4',$data);
	}

	public function detail5()	{
		$page_title = "4 Manfaat Jamu Kunyit Asam (Tak Cuma Redakan Nyeri Haid, Lho!)";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info5',$data);
	}

	public function detail6()	{
		$page_title = "Berapa Batas Asupan Karbohidrat yang Ideal Per Hari?";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info6',$data);
	}

	public function detail7()	{
		$page_title = "Mengapa Semakin Tua Kebutuhan Kalori Semakin Berkurang?";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info7',$data);
	}

	public function detail8()	{
		$page_title = "Bolehkah Ngemil Dulu Sebelum Menyantap Menu Makanan Utama?";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info8',$data);
	}

	public function detail9()	{
		$page_title = "Makanan untuk Ambeien: Mana yang Harus Dikonsumsi, Mana yang Dihindari";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info9',$data);
	}

	public function detail10()	{
		$page_title = "3 Makanan Sumber Gandum Utuh yang Sehat untuk Sarapan";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/healthy_info/detail_healthy_info10',$data);
	}
}
