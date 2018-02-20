<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Users');

    }

	public function index()	{
		$page_title = "Masuk Akun";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/login', $data);
	}

	public function registrasi() {
		$page_title = "Daftar Akun Baru";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('FE_PA/register', $data);
	}

	public function simpan()
	{
		$this->Users->save();
		redirect('index');
	}
}
