<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_info_sehat extends CI_Controller {

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
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_info_sehat'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail1()	{
		$page_title = "13 Tips Makan Sehat untuk Orang Sibuk";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat1'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail2()	{
		$page_title = "Terlalu Sering Makan Daging Bisa Kena Diabetes, Kok Bisa?";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat2'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail3()	{
		$page_title = "Mengenal Asam Amino, Fungsinya Bagi Tubuh dan Sumber Makanannya";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat3'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail4()	{
		$page_title = "5 Resep Brunch Lezat, Buat Anda yang Suka Sarapan Siang-Siang";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat4'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail5()	{
		$page_title = "4 Manfaat Jamu Kunyit Asam (Tak Cuma Redakan Nyeri Haid, Lho!)";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat5'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail6()	{
		$page_title = "Berapa Batas Asupan Karbohidrat yang Ideal Per Hari?";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat6'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail7()	{
		$page_title = "Mengapa Semakin Tua Kebutuhan Kalori Semakin Berkurang?";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat7'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail8()	{
		$page_title = "Bolehkah Ngemil Dulu Sebelum Menyantap Menu Makanan Utama?";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat8'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail9()	{
		$page_title = "Makanan untuk Ambeien: Mana yang Harus Dikonsumsi, Mana yang Dihindari";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat9'
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function detail10()	{
		$page_title = "3 Makanan Sumber Gandum Utuh yang Sehat untuk Sarapan";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/info_sehat/v_detail_info_sehat10'
		);

		$this->load->view('front_end/v_base',$data);
	}
}
