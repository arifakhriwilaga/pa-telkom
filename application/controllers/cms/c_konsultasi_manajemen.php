<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_konsultasi_manajemen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        $this->load->model('m_akun', 'accounts');
        $this->load->model('m_periksa', 'periksa');        
        if (empty($user) || $user['level_user'] == 'user') {
            redirect('/');
        }
    }

    public function index() {
        $page_title = "Konsultasi";

        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/konsultasi/v_konsultasi',
            '_js' => 'assets/js/cms/konsultasi/konsultasi.js'
        );

        $this->load->view('cms/v_base', $data);
    }

    public function ambil_konsultasi() {
        $list = $this->accounts->get_accounts('konsultasi');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $konsultasi) {
            $date = preg_split('/\-/', strval($konsultasi->tgl_lahir));
            $born_date = $date[2] . '/' . $date[1] . '/' . $date[0];;
            
            $no++;
            $row = array();
            $row[] = $konsultasi->id_user;
            $row[] = $konsultasi->nama_user;
            $row[] = $konsultasi->email;
            $row[] = $konsultasi->jk_user == 'male' ? 'Laki-laki' : 'Perempuan';
            $row[] = $born_date ;
            $row[] = '<a href="detail-konsultasi/'.$konsultasi->id_user.'"><button class="btn btn-info btn-sm info-acc" id="' . $konsultasi->id_user . '" data-name="' . $konsultasi->username . '" title="Detail Konsultasi"><i class="glyphicon glyphicon-search"></i> Detail Konsultasi</button></a>';
            $row[] = '<button class="btn btn-danger btn-sm delete-acc" id="' . $konsultasi->id_user . '" data-name="' . $konsultasi->username . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->accounts->count_all(),
            "recordsFiltered" => $this->accounts->count_filtered('konsultasi'),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function detail($id) {
        $page_title = "Detail Konsultasi";
        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/konsultasi/v_detail_konsultasi',
            '_js' => 'assets/js/cms/konsultasi/detail_konsultasi.js',
            'id' => $id
        );

        $this->load->view('cms/v_base', $data);
    }

    public function ambil_detail_konsultasi($id_user) {
        $list = $this->periksa->ambil_detail_konsultasi($id_user);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $konsultasi) {
            
            $no++;
            $row = array();
            $row[] = $konsultasi->id;
            $row[] = $konsultasi->nama_user;
            $row[] = $konsultasi->penyakit;
            $row[] = replace_newline($konsultasi->solusi_solusi);
            $row[] = date('d/m/Y', strtotime($konsultasi->tanggal_dibuat));

            $data[] = $row;
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->periksa->count_detail_all($id_user),
            "recordsFiltered" => $this->periksa->count_detail_filtered($id_user),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function hapus_semua_konsultasi($id_user = null) {
        // var_dump($id_user);exit();
        $result = $this->periksa->delete_all_konsultasi($id_user);
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

}
