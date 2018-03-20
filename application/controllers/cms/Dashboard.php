<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $born_date;

	public function __construct() {
    parent::__construct();
    $this->load->model('LoginHistory','login_history');
    
    $user = $this->session->userdata('user');
    $date = preg_split('/\-/', strval($user['born_date']));
    
    $this->born_date = $date[2] . '/' . $date[1] . '/' . $date[0];
    if (empty($user) || $user['level_user'] == 'user') {
    	redirect('/');
    }
  }

	public function index()	{
		$result = $this->login_history->get_history($this->session->userdata('user')['user_id']);
		
		$login_histories = array();
		if (isset($result)) {
			foreach ($result as $key => $value) {
					$login_histories[] = array(
						'user_id' => $value->user_id,
						'date' => date('d/m/Y', strtotime($value->created_date)),
						'day' => $this->change_format_day(date('l', strtotime($value->created_date))),
						'time' => date('H.i', strtotime($value->created_date)),
					);
			}
		}

		$page_title = "Dasbor";

		$data = array(
			'page_title' => $page_title,
			'_content' => 'cms/dashboard/dashboard',
			'born_date' => $this->born_date,
			'login_histories' => $login_histories
		);

		$this->load->view('cms/base', $data);
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
		// return $date == 'Sunday' ? 'Minggu' : $date == 'Monday' ? 'Senin' : $date == 'Tuesday' ? 'Selasa' : $date == 'Wednesday' ? 'Rabu' : $date == 'Thursday' ? 'Kamis' : $date == 'Friday' ? 'Jumat' : 'Sabtu';
	}
}
