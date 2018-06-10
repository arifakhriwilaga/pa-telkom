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

    // public function ambil_konsultasi() {
    //     $list = $this->notifications->get_notifications();
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($list as $notifications) {
    //         $no++;
    //         $row = array();
    //         $row[] = $notifications->consul_id;
    //         $row[] = $notifications->name;
    //         $row[] = $notifications->username;
    //         $row[] = (strlen($notifications->questions) > 240 ? '<div style="max-height:150px;overflow-y:scroll;">' . $notifications->questions . '</div>' : $notifications->questions);
    //         $row[] = $this->checkSend($notifications->send_status, $notifications);
    //         $row[] = $this->checkAnswer($notifications->answer_status, $notifications);

    //         $data[] = $row;
    //     }

    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $this->notifications->count_all(),
    //         "recordsFiltered" => $this->notifications->count_filtered(),
    //         "data" => $data
    //     );
    //     echo json_encode($output);
    // }

    public function ambil_konsultasi() {
        $list = $this->accounts->get_accounts();
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
            $row[] = '<a href="detail-konsultasi/'.$konsultasi->id_user.'"><button class="btn btn-info btn-sm info-acc" id="' . $konsultasi->id_user . '" data-name="' . $konsultasi->username . '" title="Detail Konsultasi">Detail Konsultasi<i class="glyphicon glyphicon-"></i></button></a>';
            $row[] = '<button class="btn btn-danger btn-sm delete-acc" id="' . $konsultasi->id_user . '" data-name="' . $konsultasi->username . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->accounts->count_all(),
            "recordsFiltered" => $this->accounts->count_filtered(),
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
        // var_dump($id_user);exit();
        $list = $this->periksa->ambil_detail_konsultasi($id_user);
        // var_dump($list);exit();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $konsultasi) {
            // var_dump($konsultasi);exit();
            // $date = preg_split('/\-/', strval($konsultasi->tanggal_dibuat));
            // $tanggal_konsultasi = $date[2] . '/' . $date[1] . '/' . $date[0];;
            
            $no++;
            $row = array();
            $row[] = $konsultasi->id;
            $row[] = $konsultasi->nama_user;
            $row[] = $konsultasi->penyakit;
            $row[] = replace_newline($konsultasi->solusi_solusi);
            $row[] = date('d/m/Y', strtotime($konsultasi->tanggal_dibuat));

            $data[] = $row;
        }
        // exit();
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->periksa->count_detail_all($id_user),
            "recordsFiltered" => $this->periksa->count_detail_filtered($id_user),
            "data" => $data,
        );
        echo json_encode($output);
    }

}
