<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {
	public $user;
	public function __construct() {
	    parent::__construct();
	    $this->load->model('CheckUp', 'checkup');
	    $this->load->model('CetakRiwayat', 'cetak_riwayat');
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
		$symptoms = $this->checkup->get_symptoms();
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/check/step_1',
			'_js' => 'assets/js/front_end/check/step_1.js',
			'symptoms' => $symptoms
		);

		$this->load->view('front_end/base',$data);
	}

	public function check_step_2() {
		$page_title = "Periksa";
		$symptom_id = $this->input->post('symptom_id') ? $this->input->post('symptom_id') : $this->session->flashdata('symptom_id');
		$step_checkup_id = $this->session->flashdata('step_checkup_id');
		$answer = $this->session->flashdata('answer');
		$step_checkup = null;
		if ($step_checkup_id) {
			$step_checkup = $this->checkup->checkup_by_parent_id($step_checkup_id, $answer);
		} else {
			$step_checkup = $this->checkup->checkup_by_symptom_id($symptom_id);
		}

		$symptom = $this->checkup->get_symptom($symptom_id);

		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/check/step_2',
			'_js' => 'assets/js/front_end/check/step_2.js',
			'step_checkup' => $step_checkup,
			'symptom' => $symptom
		);

		$this->load->view('front_end/base',$data);
	}

	public function validation_checker() {
		$step_checkup_id = $this->input->post('step_checkup_id');
		$answer = $this->input->post('answer');
		$symptom_id = $this->input->post('symptom_id');
		$sickness_false = $this->input->post('sickness_false');
		$sickness_true = $this->input->post('sickness_true');

		$this->session->set_flashdata('step_checkup_id', $step_checkup_id);
		$this->session->set_flashdata('answer', $answer);
		$this->session->set_flashdata('symptom_id', $symptom_id);
		$this->session->set_flashdata('sickness_false', $sickness_false);
		$this->session->set_flashdata('sickness_true', $sickness_true);
		
		if ($this->checkup->checkup_by_parent_id($step_checkup_id, $answer)) {
			return redirect('periksa/step-2');
		} else {
			return redirect('periksa/step-final');
			
		}
	}

	public function check_step_final() {
		$page_title = "Periksa";
		$answer = $this->session->flashdata('answer');
		$id_penyakit = null;

		if ($answer=="true") {
			$id_penyakit = $this->session->flashdata('sickness_true');
		} else {
			$id_penyakit = $this->session->flashdata('sickness_false');
		}

		$sickness = $this->checkup->get_sickness_by_id($id_penyakit);
		$this->checkup->pos_periksa($this->user['user_id'], $id_penyakit);

		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/check/step_final',
			'_js' => 'assets/js/front_end/check/step_final.js',
			'sickness' => $sickness
		);
		$this->load->view('front_end/base',$data);
	}

	public function print_sick_letter() {
		$this->load->library('pdfgenerator');

		$this->cetak_riwayat->submit($this->user['user_id']);
		$diagnosa = $this->checkup->hasil_periksa($this->user['user_id']);
		
		$page_title = "Surat Prediksi Penyakit";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/check/view_pdf_sick_letter',
			'_js' => 'assets/js/front_end/check/step_2.js',
			'user' => array(
				'name' => ucwords($this->user['name']), 
				'born_date' => date_formater(date('j F Y',strtotime($this->user['born_date']))),
				'today' => date_formater(date('j F Y')),
				'diagnosa' => $diagnosa->diagnosis
			)
		);

	    $html = $this->load->view('front_end/base_print',$data,true);
	    
	    $this->pdfgenerator->generate($html,'Surat Keterangan Sakit');
	 }
}