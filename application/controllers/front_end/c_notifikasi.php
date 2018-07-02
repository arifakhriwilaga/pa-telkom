<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_notifikasi extends CI_Controller {
    var $user;
    public function __construct() {
        parent::__construct();
        $this->load->model('m_notifikasi', 'notifications');
        $this->user = $this->session->userdata('user');
        if ($this->user['level_user'] == 'admin') {
            redirect('dasbor');
        } elseif($this->user['level_user'] == 'dokter') {
            redirect('dasbor');
        }
        
    }

    public function index() {
        $page_title = "Notifikasi";
        $notifications = $this->notifications->get_all($this->user['id_user']);
        if (isset($notifications)) {
			foreach ($notifications as $key => $value) {
                $hari = $this->rubah_format_hari(date('l', strtotime($value->tgl_konsul)));
                $tanggal = date('d', strtotime($value->tgl_konsul));
                $bulan = $this->rubah_format_bulan(date('F', strtotime($value->tgl_konsul)));
                $tahun = date('Y', strtotime($value->tgl_konsul));
                $jam = date('H.i', strtotime($value->tgl_konsul));
                // var_dump(date('l', strtotime($value->tgl_konsul));
                $value->tgl_konsul = $hari .', '.  $tanggal .' '. $bulan .' '. $tahun .' - '. $jam;
            }
        }
        // exit();
        $data = array(
            'page_title' => $page_title,
            'notifications' => $notifications,
            '_content' => 'front_end/pengguna/v_notifikasi',
            '_css' => 'assets/css/front_end/pengguna/notifikasi.css',
            '_js' => 'assets/js/front_end/pengguna/notifikasi.js'
        );

        $this->load->view('front_end/v_base', $data);
    }

    public function detail($id) {
        $page_title = "Notifikasi";
        $this->notifications->read_notif($id);
        $notif = $this->notifications->detail($id);
        $notif[0]->jawaban_konsul = ($notif[0]->jawaban_konsul != "") ? $notif[0]->jawaban_konsul : "Pertanyaan belum dijawab dokter"; 
        $data = array(
            'page_title' => $page_title,
            'notif' => $notif[0],
            '_content' => 'front_end/pengguna/v_detail_notifikasi',
            '_css' => 'assets/css/front_end/pengguna/detail_notifikasi.css',
            '_js' => 'assets/js/front_end/pengguna/detail_notifikasi.js'
        );

        $this->load->view('front_end/v_base', $data);
    }
    
    public function count_notif() {
        $user_id = $this->input->post('id_user');
        $result = $this->notifications->count_notif($user_id);
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

    // public function rubah_format_hari($tanggal_konsul) {
        
    // }
    public function rubah_format_hari($hari) {
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
    
    public function rubah_format_bulan($bulan) {
		switch ($bulan) {
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
				return 'Mei';
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

}
