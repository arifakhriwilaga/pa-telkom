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
        if($this->user['level_user'] == 'dokter') {
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
    
    // public function detail($id) {
    //     $page_title = "Detail Konsultasi";
    //     $data = array(
    //         'page_title' => $page_title,
    //         '_content' => 'cms/konsultasi/v_detail_konsultasi',
    //         '_js' => 'assets/js/cms/konsultasi/detail_konsultasi.js',
    //         'id' => $id
    //     );
    // }

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
            $row[] = '<a href="detail-kunjungan/'.$checkup->id_penyakit.'"><button class="btn btn btn-login btn-sm info-acc" id="' . $checkup->id_penyakit . '" title="Detail Kunjungan" style="min-width: 7px;height:38px;font-size: 13px;margin-top:0;padding-left:0;background-color:#1c9fbc;border-color:#1C9FBD"><i class="glyphicon glyphicon-info"></i> Detail Konsultasi</button></a>';
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

    public function detail($id) {
		$page_title = "Periksa";

        $penyakit = $this->checkup->ambil_penyakit_dengan_id($id);
        
        $dokter = $this->checkup->ambil_dokter_random();
        $data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/periksa/v_step_final',
			'_js' => 'assets/js/front_end/periksa/step_final.js',
			'penyakit' => $penyakit,
			'dokter' => $dokter,
		);
		return $this->load->view('front_end/v_base',$data);
    }
}