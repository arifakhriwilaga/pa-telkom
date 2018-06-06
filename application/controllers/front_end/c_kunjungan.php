<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_kunjungan extends CI_Controller {

	public $user;

	public function __construct() {
		parent::__construct();
		$this->load->model('m_periksa','checkup');
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
            '_content' => 'front_end/kunjungan/v_kunjungan',
            '_js' => 'assets/js/front_end/kunjungan/kunjungan.js'
		);

		$this->load->view('front_end/v_base',$data);
	}

    public function ambil_kunjungan() {
        $list = $this->checkup->ambil_kunjungan($this->user['id_user']);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $checkup) {
            $date = explode(' ', $checkup->tanggal_dibuat);
            $no++;
            $row = array();
            $row[] = date('d-m-Y', strtotime($checkup->tanggal_dibuat));
            $row[] = date('H.i', strtotime($checkup->tanggal_dibuat));
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->checkup->count_all(),
            "recordsFiltered" => $this->checkup->count_filtered($this->user['id_user']),
            "data" => $data
        );
        echo json_encode($output);
    }
}