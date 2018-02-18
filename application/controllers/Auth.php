<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }

	public function index()	{
		$this->load->view('FE_PA/login');
	}

	public function registrasi() {
		$this->load->view('FE_PA/register');
	}
}
