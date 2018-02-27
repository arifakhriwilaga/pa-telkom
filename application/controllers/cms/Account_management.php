<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_management extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
	    if ($user['level_user'] == 'user') {
	    	redirect('/');
	    }
    }

	public function index()	{
		$page_title = "Kelola Akun";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('cms/account/account', $data);
	}
}
