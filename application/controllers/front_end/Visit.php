<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visit extends CI_Controller {

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
            '_content' => 'front_end/visit/visit',
            '_js' => 'assets/js/front_end/visit/visit.js'
		);

		$this->load->view('front_end/base',$data);
	}
}