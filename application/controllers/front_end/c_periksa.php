<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_periksa extends CI_Controller {
	public $user;
	public function __construct() {
	    parent::__construct();
		$this->load->model('m_periksa', 'checkup');
		$this->load->model('m_cetak_riwayat', 'cetak_riwayat');
	    $this->user = $this->session->userdata('user','User');
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
		$page_title = "Periksa";
		$gejala = $this->checkup->ambil_gejala();
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/periksa/v_step_1',
			'_js' => 'assets/js/front_end/periksa/step_1.js',
			'gejala' => $gejala
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function check_step_2() {
		$page_title = "Periksa";
		// var_dump($this->input->post('id_gejala'));
		$id_gejala = $this->input->post('id_gejala') ? $this->input->post('id_gejala') : $this->session->flashdata('id_gejala');
		$id_tahap_periksaan = $this->session->flashdata('id_tahap_periksa');
		$answer = $this->session->flashdata('jawaban');
		$tahap_pemeriksaan = null;
		if ($id_tahap_periksaan) {
			$tahap_pemeriksaan = $this->checkup->pemeriksaan_dengan_status_muncul_setelah_id_pemeriksaan($id_tahap_periksaan, $answer);
		} else {
			$tahap_pemeriksaan = $this->checkup->pemeriksaan_dengan_id_gejala($id_gejala);
		}
		
		$gejala = $this->checkup->ambil_gejala_dengan_id($id_gejala);
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/periksa/v_step_2',
			'_js' => 'assets/js/front_end/periksa/step_2.js',
			'tahap_pemeriksaan' => $tahap_pemeriksaan,
			'gejala' => $gejala
		);

		$this->load->view('front_end/v_base',$data);
	}

	public function pengecekan_pertanyaan() {
		$id_tahap_periksa = $this->input->post('id_tahap_periksa');
		$jawaban = $this->input->post('jawaban');
		$id_gejala = $this->input->post('id_gejala');
		$penyakit_benar = $this->input->post('penyakit_benar');
		$penyakit_salah = $this->input->post('penyakit_salah');

		$this->session->set_flashdata('id_tahap_periksa', $id_tahap_periksa);
		$this->session->set_flashdata('jawaban', $jawaban);
		$this->session->set_flashdata('id_gejala', $id_gejala);
		$this->session->set_flashdata('penyakit_benar', $penyakit_benar);
		$this->session->set_flashdata('penyakit_salah', $penyakit_salah);
		if ($this->checkup->pemeriksaan_dengan_status_muncul_setelah_id_pemeriksaan($id_tahap_periksa, $jawaban)) {
			return redirect('periksa/step-2');
		} else {
			return redirect('periksa/step-final');
			
		}
	}

	public function check_step_final() {
		$page_title = "Periksa";
		$jawaban = $this->session->flashdata('jawaban');
		$id_penyakit = null;

		if ($jawaban=="true") {
			$id_penyakit = $this->session->flashdata('penyakit_benar');
		} else {
			$id_penyakit = $this->session->flashdata('penyakit_salah');
		}

		$penyakit = $this->checkup->ambil_penyakit_dengan_id($id_penyakit);
		$this->checkup->simpan_periksa($this->user['id_user'], $id_penyakit);
		$dokter = $this->checkup->ambil_dokter_random();
		
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/periksa/v_step_final',
			'_js' => 'assets/js/front_end/periksa/step_final.js',
			'penyakit' => $penyakit,
			'dokter' => $dokter,
		);
		$this->load->view('front_end/v_base',$data);
	}

	public function print_sick_letter() {
		$this->load->library('pdfgenerator');

		$this->cetak_riwayat->submit($this->user['id_user']);
		$diagnosa = $this->checkup->hasil_periksa($this->user['id_user']);
		$dokter = $this->checkup->ambil_dokter_random();
		
		$page_title = "Surat Prediksi Penyakit";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/periksa/v_pdf_sick_letter',
			'_js' => 'assets/js/front_end/check/step_2.js',
			'users' => array(
				'nama_user' => ucwords($this->user['nama_user']), 
				'tgl_lahir' => date_formater(date('j F Y',strtotime($this->user['tgl_lahir']))),
				'hari_ini' => date_formater(date('j F Y')),
				'diagnosa' => $diagnosa->diagnosa,
				'dokter' => $dokter
			)
		);

	    $html = $this->load->view('front_end/v_base_print',$data,true);
	    
	    $this->pdfgenerator->generate($html,'Surat Keterangan Sakit');
	 }

	public function cari_gejala(){
		$json = [];

		if(!empty($this->input->get("q"))){
			$json = $this->checkup->cari_gejala($this->input->get("q"));
		}
		
		echo json_encode($json);
	}

	public function change_month($month) {
		switch ($month) {
			case 'January':
				return 'Januari';
				break;
			case 'February':
				return 'Februari';
				break;
			case 'March':
				return 'Maret';
				break;
			case 'April':
				return 'April';
				break;
			case 'May':
				return 'Jumat';
				break;
			case 'June':
				return 'Juni';
				break;
			case 'July':
				return 'Juli';
				break;
			case 'August':
				return 'Agustus';
				break;
			case 'September':
				return 'September';
				break;
			case 'October':
				return 'Oktober';
				break;
			case 'November':
				return 'November';
				break;
			default:
				return 'Desember';
				break;
			}
	}

	public function format_day_month_year($day,$month, $year = "") {
		return ($day == "" ? date('d') : $day)." ".$this->change_month(date('F', strtotime($month))) ." ". ($year == "" ? date('Y') : $year);
	}

}