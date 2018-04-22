<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {
	public $user;
	public function __construct() {
    parent::__construct();
    $this->user = $this->session->userdata('user','User');
    if ($this->user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/check/step_1_form_check',
			'_js' => 'assets/js/front_end/check/step_1.js'
		);

		$this->load->view('front_end/base',$data);
	}

	public function check_step_2() {
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/check/step_2_form_check',
			'_js' => 'assets/js/front_end/check/step_2.js'
		);

		$this->load->view('front_end/base',$data);
	}

	public function check_step_final() {
		$page_title = "Periksa";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/check/step_final_form_check',
			'_js' => 'assets/js/front_end/check/step_final.js'
		);

		$this->load->view('front_end/base',$data);
	}

	public function print_sick_letter() {
		$this->load->library('pdfgenerator');
		$now = date('m-d'); 
		$born =	date('m-d', strtotime($this->user['born_date']));
		
		$age = strval((intval(date('Y')) - intval(date('Y',strtotime($this->user['born_date']))) - 1) + (($now > $born) == true ? 1 : 0));
		// $today = date('d')." ".$this->change_month(date('F', strtotime($this->user['born_date']))) ." ". date('Y');
		// var_dump($age);
		// var_dump((($now > $born) == true ? 1 : 0));
		// var_dump(date('d/m') > date('d/m',strtotime($this->user['born_date'])));
		// var_dump("now".date('d/m'));
		// print_r("born_date".date('d/m',strtotime($this->user['born_date'])));
		// exit();

		$page_title = "Surat Prediksi Penyakit";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'front_end/check/view_pdf_sick_letter',
			'_js' => 'assets/js/front_end/check/step_2.js',
			'users' => array(
				'age' => $age,
				'name' => ucwords($this->user['name']), 
				'born_date' => $this->format_day_month_year(date('j',strtotime($this->user['born_date'])),$this->user['born_date'],date('Y',strtotime($this->user['born_date']))),
				'today' => $this->format_day_month_year("",date('Y-m-d'))
			)
		);
 
		// $data['users']=array(
		// 	array('firstname'=>'Agung','lastname'=>'Setiawan','email'=>'ag@setiawan.com'),
		// 	array('firstname'=>'Hauril','lastname'=>'Maulida Nisfar','email'=>'hm@setiawan.com'),
		// 	array('firstname'=>'Akhtar','lastname'=>'Setiawan','email'=>'akh@setiawan.com'),
		// 	array('firstname'=>'Gitarja','lastname'=>'Setiawan','email'=>'git@setiawan.com')
		// );
 			
	    // $this->load->view('front_end/base_print',$data);
	    $html = $this->load->view('front_end/base_print',$data,true);
	    
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