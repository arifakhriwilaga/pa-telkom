<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $born_date;

	public function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    $date = preg_split('/\-/', strval($user['born_date']));
    
    $this->born_date = $date[2] . '/' . $date[1] . '/' . $date[0];
    // var_dump($born_date);exit();
    if (empty($user) || $user['level_user'] == 'user') {
    	redirect('/');
    }
  }

	public function index()	{
		$page_title = "Dasbor";

		$data = array(
			'page_title' => $page_title,
			'born_date' => $this->born_date
		);

		$this->load->render('cms/dashboard/dashboard', $data);
	}
}
