<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Users');

    }

	public function index()	{
		$this->load->render('FE_PA/login');
	}

	public function registrasi() {
		$this->load->render('FE_PA/register');
	}

	public function save()
	{
		if ($this->Users->validation('save')) {
			$this->Users->save();
			redirect('index');
		}
	}
}
