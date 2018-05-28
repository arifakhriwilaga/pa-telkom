<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_riwayat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CetakRiwayat', 'cetak_riwayat');
        $user = $this->session->userdata('user');
        if (empty($user) || $user['level_user'] == 'user') {
            redirect('/');
        }
    }

    public function index() {
        $page_title = "Cetak Riwayat";

        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/cetak_riwayat/cetak_riwayat',
            '_js' => 'assets/js/cms/cetak_riwayat/cetak_riwayat.js'
        );

        $this->load->view('cms/base', $data);
    }

    public function ambil_cetak_riwayat() {
        $list = $this->cetak_riwayat->ambil_cetak_riwayat();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $cetak_riwayat) {
            $no++;
            $row = array();
            $row[] = $cetak_riwayat->id;
            $row[] = $cetak_riwayat->name;
            $row[] = $cetak_riwayat->username;
            $row[] = $cetak_riwayat->tanggal_dibuat;
            $row[] = '<button class="btn btn-danger btn-sm hapus-cetak-riwayat" id="' . $cetak_riwayat->id . '" data-name="' . $cetak_riwayat->name . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->cetak_riwayat->count_all(),
            "recordsFiltered" => $this->cetak_riwayat->count_filtered(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function hapus_cetak_riwayat() {
        $result = $this->cetak_riwayat->hapus_cetak_riwayat();
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

}
