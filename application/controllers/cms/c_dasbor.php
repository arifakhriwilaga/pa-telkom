<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dasbor extends CI_Controller {
	private $born_date;

	public function __construct() {
    parent::__construct();
    $this->load->model('m_history_login','login_history');
    
    $user = $this->session->userdata('user');
    $this->born_date = date('d/m/Y', strtotime($user['tgl_lahir']));
    
    if (empty($user) || $user['level_user'] == 'user') {
    	redirect('/');
    }
  }

	public function index()	{
		$result = $this->login_history->mengambil_history($this->session->userdata('user')['id_user']);
		
		$login_histories = array();
		if (isset($result)) {
			foreach ($result as $key => $value) {
					$login_histories[] = array(
						'user_id' => $value->id_user,
						'date' => date('d/m/Y', strtotime($value->tgl_login)),
						'day' => $this->change_format_day(date('l', strtotime($value->tgl_login))),
						'time' => date('H.i', strtotime($value->tgl_login)),
					);
			}
		}

		$page_title = "Dasbor";

		$data = array(
			'page_title' => $page_title,
			'_content' => 'cms/dasbor/v_dasbor',
			'born_date' => $this->born_date,
			'login_histories' => $login_histories
		);

		$this->load->view('cms/v_base', $data);
	}

	public function change_format_day($date) {
		switch ($date) {
			case 'Monday':
				return 'Senin';
				break;
			case 'Tuesday':
				return 'Selasa';
				break;
			case 'Wednesday':
				return 'Rabu';
				break;
			case 'Thursday':
				return 'Kamis';
				break;
			case 'Friday':
				return 'Jumat';
				break;
			case 'Saturday':
				return 'Sabtu';
				break;
			default:
				return 'Minggu';
				break;
		}
	}
}
