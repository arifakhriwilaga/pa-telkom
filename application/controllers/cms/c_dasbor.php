<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*  
	** NOTE c_dasbor **
	list fungsi bawaan PHP :
	- date ()
	- strtime ()
	- preg_split ()
	- strval ()
	- empty ()
	- array ()
*/
class c_dasbor extends CI_Controller {
	private $format_baru_tgl_lahir; // variable untuk menyimpan value tanggal lahir

	/*  
		nama fungsi : __construct
		deskripsi : method awal untuk pengambilan data user, history login dan untuk kebutuhan pengecekan level user.
	*/
	public function __construct() {
		parent::__construct(); // pemanggilan method default parent
		
		// pemanggilan model yang dibutuhkan
		$this->load->model('m_history_login','login_history');
		
		// mengambil data user dari session
		$user = $this->session->userdata('user');
		
		// kondisi mengganti nilai tanggal lahir agar menjadi dd/mm/yyyy
		$this->format_baru_tgl_lahir = date('d/m/Y', strtotime($user['tgl_lahir']));

		// pengecekan level-user
		if (empty($user) || $user['level_user'] == 'user') {
			redirect('/');
		}
	}

	/*  
		nama fungsi : index
		deskripsi : method untuk set data yang akan ditampilkan pada html
	*/
	public function index()	{
		// pengambilan data history login, jika 'ada' maka akan masuk kondisi 'if (isset($hasil))'
		$hasil = $this->login_history->mengambil_history($this->session->userdata('user')['id_user']);
		$data_history_login = array();
		if (isset($hasil)) {
			foreach ($hasil as $key => $value) {
					$data_history_login[] = array(
						'user_id' => $value->id_user,
						'tanggal' => date('d/m/Y', strtotime($value->tgl_login)), // merubah format tgl_login menjadi 'dd/mm/yyyy (tanggal/bulan/tahun)'
						'hari' => $this->ubah_format_hari(date('l', strtotime($value->tgl_login))), // merubah format tgl_login menjadi 'd (hari)'
						'waktu' => date('H.i', strtotime($value->tgl_login)), // merubah format tgl_login menjadi 'H.m' (Jam.menit)
					);
			}
		}

		// data yang akan ditampilkan pada html dimasukan kedalam array
		$page_title = "Dasbor";
		$data = array(
			'page_title' => $page_title,
			'_content' => 'cms/dasbor/v_dasbor',
			'tgl_lahir' => $this->format_baru_tgl_lahir,
			'data_history_login' => $data_history_login
		);

		$this->load->view('cms/v_base', $data);
	}

	/*  
		nama fungsi : ubah_format_hari
		deskripsi : method untuk perubahan hari
	*/
	public function ubah_format_hari($hari) {
		switch ($hari) {
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
