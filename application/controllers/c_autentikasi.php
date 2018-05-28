<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_autentikasi extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Auth', 'auth');
        $this->load->model('User', 'user');
        $this->load->model('LoginHistory', 'login_history');
        $this->load->helper(array('Form', 'Cookie', 'String'));
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
			'_content' => 'autentikasi/v_login',
			'_js' => 'assets/js/autentikasi/login.js'
		);

		$this->load->view('front_end/v_base', $data);
	}
	
	public function lakukan_login()	{
		$result = $this->auth->login();
		if ($result['status']) {
			$user = $this->user->get_user($result['data']->user_id);
			$this->session->set_userdata('user', $user);
			$this->session->set_flashdata('success', $result['message']);
			
			if ($result['data']->level_user == 'user') {
				return redirect('/');
			} elseif ($result['data']->level_user == 'admin') {
      	$result_record = $this->login_history->post($result['data']->user_id);
      	return $result_record ? redirect('dasbor') : $this->logout();
        // var_dump($result_record);exit();
        // echo "<pre>"; $result_record ;"</pre>";exit();
				;
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

	public function registrasi() {
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
			'_content' => 'autentikasi/v_registrasi',
			'_js' => 'assets/js/autentikasi/registrasi.js'
		);

		$this->load->view('front_end/v_base', $data);
	}

	public function lakukan_registrasi() {
		$result = $this->auth->save();
		if ($result['status']) {
			$this->session->set_flashdata('success', $result['message']);
			return redirect('masuk-akun');
		} else {
			$this->session->set_flashdata('error', $result['message']);
			
			return redirect('registrasi');
		}
	}

	public function lupa_kata_sandi() {
		$page_title = "Lupa Password";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'autentikasi/v_lupa_kata_sandi',
			'_js' => 'assets/js/autentikasi/lupa_kata_sandi.js'
		);

		$this->load->view('front_end/v_base', $data);
	}

	public function lakukan_reset_kata_sandi() {
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
