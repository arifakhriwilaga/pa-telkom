<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visit extends CI_Controller {

    public $user;

	public function __construct() {
    parent::__construct();
    $this->load->model('CheckUp','checkup');
    $this->user = $this->session->userdata('user');
    if (empty($this->user)) {
    	redirect('masuk-akun');
    }
    if ($this->user['level_user'] == 'admin') {
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

    public function ambil_kunjungan() {
        $list = $this->checkup->ambil_kunjungan($this->user['user_id']);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $checkup) {
            $date = explode(' ', $checkup->tanggal_dibuat);
            $no++;
            $row = array();
            $row[] = $date[0];
            $row[] = $date[1];
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->checkup->count_all(),
            "recordsFiltered" => $this->checkup->count_filtered($this->user['user_id']),
            "data" => $data
        );
        echo json_encode($output);
    }
}