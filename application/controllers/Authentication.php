<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Auth', 'auth');
        $this->load->model('User', 'user');
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
			'page_title' => $page_title,
			'_content' => 'authentication/login',
			'_js' => 'assets/js/authentication/login.js'
		);

		$this->load->view('front_end/base', $data);
	}
	
	public function do_login()	{
		$result = $this->auth->login();
		if ($result['status']) {
			$user = $this->user->get_user($result['data']->user_id);
			$this->session->set_userdata('user', $user);
			$this->session->set_flashdata('success', $result['message']);
			if ($result['data']->level_user == 'user') {
				return redirect('/');
			} elseif ($result['data']->level_user == 'admin') {
				return redirect('dasbor');
			}
		} else {
			$this->session->set_flashdata('error', $result['message']);
			return redirect('masuk-akun');
		}
	}

	function logout() {
		$this->session->userdata = array();
        $this->session->sess_destroy();
		redirect(base_url('/'));
	}

	public function register() {
		$user = $this->session->userdata('user');
	    if ($user) {
	    	if ($user['level_user'] == 'user') {
		    	redirect('/');
	    	} elseif ($user['level_user'] == 'admin') {
		    	redirect('dasbor');
		    }
	    }
	    
		$page_title = "Daftar Akun Baru";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'authentication/register',
			'_js' => 'assets/js/authentication/register.js'
		);

		$this->load->view('front_end/base', $data);
	}

	public function do_register() {
		$result = $this->auth->save();
		if ($result['status']) {
			$this->session->set_flashdata('success', $result['message']);
			return redirect('masuk-akun');
		} else {
			$this->session->set_flashdata('error', $result['message']);
			
			return redirect('registrasi');
		}
	}

	public function forgot_password() {
		$page_title = "Lupa Password";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'authentication/forgot_password',
			'_js' => 'assets/js/authentication/forgot_password.js'
		);

		$this->load->view('front_end/base', $data);
	}

	public function do_reset_password() {
		$result = $this->auth->reset_password();
		if ($result['status']) {
			$this->session->set_flashdata('success', $result['message']);
			return redirect('masuk-akun');
		} else {
			$this->session->set_flashdata('error', $result['message']);
			
			return redirect('lupa-kata-sandi');
		}
	}
}
