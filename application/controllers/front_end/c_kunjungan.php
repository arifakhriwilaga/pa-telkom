<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_kunjungan extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    if (empty($user)) {
    	redirect('masuk-akun');
    }
    if ($user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		$page_title = "Kunjungan";
		$data = array(
			'page_title' => $page_title,
            '_content' => 'front_end/kunjungan/v_kunjungan',
            '_js' => 'assets/js/front_end/kunjungan/kunjungan.js'
		);

		$this->load->view('front_end/v_base',$data);
	}
}