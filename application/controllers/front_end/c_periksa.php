<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_periksa extends CI_Controller {
	public $user;
	public function __construct() {
	    parent::__construct();
	    $this->load->model('m_periksa', 'checkup');
	    $this->user = $this->session->userdata('user','User');
	    if (empty($this->user)) {
            redirect('masuk-akun');
        }
	    if ($this->user['level_user'] == 'admin') {
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
		$id_gejala = $this->input->post('id_gejala') ? $this->input->post('id_gejala') : $this->session->flashdata('id_gejala');
		$id_tahap_periksaan = $this->session->flashdata('id_tahap_periksa');
		$answer = $this->session->flashdata('answer');
		$tahap_pemeriksaan = null;
		if ($id_tahap_periksaan) {
			$tahap_pemeriksaan = $this->checkup->pemeriksaan_dengan_status_muncul_setelah_id_pemeriksaan($id_tahap_periksaan, $answer);
		} else {
			$tahap_pemeriksaan = $this->checkup->pemeriksaan_dengan_id_gejala($id_gejala);
		}

		$gejala = $this->checkup->ambil_gejala_dengan_id($id_gejala);
		// var_dump($tahap_pemeriksaan);exit();
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
		var_dump($this->checkup->pemeriksaan_dengan_status_muncul_setelah_id_pemeriksaan($id_tahap_periksa, $jawaban));exit();
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

		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/periksa/v_step_final',
			'_js' => 'assets/js/front_end/periksa/step_final.js',
			'penyakit' => $penyakit
		);
		$this->load->view('front_end/v_base',$data);
	}

	public function print_sick_letter() {
		$this->load->library('pdfgenerator');
		$now = date('m-d'); 
		$born =	date('m-d', strtotime($this->user['born_date']));
		
		$age = strval((intval(date('Y')) - intval(date('Y',strtotime($this->user['born_date']))) - 1) + (($now > $born) == true ? 1 : 0));
		$page_title = "Surat Prediksi Penyakit";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/periksa/v_pdf_sick_letter',
			'_js' => 'assets/js/front_end/periksa/step_2.js',
			'users' => array(
				'age' => $age,
				'name' => ucwords($this->user['name']), 
				'born_date' => $this->format_day_month_year(date('j',strtotime($this->user['born_date'])),$this->user['born_date'],date('Y',strtotime($this->user['born_date']))),
				'today' => $this->format_day_month_year("",date('Y-m-d'))
			)
		);
 
	    $html = $this->load->view('front_end/v_base_print',$data,true);
	    $this->pdfgenerator->generate($html,'Surat Keterangan Sakit');
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