<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Auth');
    }

	public function index()	{
		$user = $this->session->userdata('user');
	    if ($user) {
	    	if ($user['level_user'] == 'user') {
		    	redirect('/');
	    	} elseif ($user['level_user'] == 'admin') {
		    	redirect('dasbor');
		    }
	    }
		
		$page_title = "Masuk Akun";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('login', $data);
	}
	
	public function login()	{
		$result = $this->Auth->login();
		if ($result['status']) {
			$user = array(
				'user_id' => $result['data']->user_id,
				'username' => $result['data']->username,
				'name' => $result['data']->name,
				'email' => $result['data']->email,
				'gender' => $result['data']->gender,
				'born_date' => $result['data']->born_date,
				'password' => $result['data']->password,
				'level_user' => $result['data']->level_user,
				'created_date' => $result['data']->created_date
			);
			$this->session->set_userdata('user', $user);
		}
		$this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
	}

	function logout() {
		$this->session->userdata = array();
        $this->session->sess_destroy();
		redirect(base_url('/'));
	}

	public function register() {
		$page_title = "Daftar Akun Baru";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('register', $data);
	}

	public function forgot_password() {
		$page_title = "Lupa Password";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('front_end/forgot_password', $data);
	}

	public function simpan() {
		$result = $this->Auth->save();
		$this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
	}
}
