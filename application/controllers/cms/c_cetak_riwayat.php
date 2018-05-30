<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*  
	** NOTE c_cetak_riwayat **
	list fungsi bawaan PHP :
	- json_encode ()
	- count_all ()
	- count_filtered ()
	- array ()
*/
class c_cetak_riwayat extends CI_Controller {

    /*  
		nama fungsi : __construct
		deskripsi : method awal untuk pengambilan data user untuk kebutuhan pengecekan level-user
	*/
    public function __construct() {
        parent::__construct(); // pemanggilan method default parent

		// pemanggilan model yang dibutuhkan
        $this->load->model('m_cetak_riwayat', 'cetak_riwayat');

		// mengambil data user dari session        
        $user = $this->session->userdata('user');

		// pengecekan level-user        
        if (empty($user) || $user['level_user'] == 'user') {
            redirect('/');
        }
    }

    /*  
		nama fungsi : index
		deskripsi : method untuk set data yang akan ditampilkan pada html
	*/
    public function index() {
        $page_title = "Cetak Riwayat";

		// data yang akan ditampilkan pada html dimasukan kedalam array        
        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/cetak_riwayat/v_cetak_riwayat',
            '_js' => 'assets/js/cms/cetak_riwayat/cetak_riwayat.js'
        );

        $this->load->view('cms/v_base', $data);
    }

    /*  
		nama fungsi : ambil_cetak_riwayat
		deskripsi : method untuk get data dari db
	*/
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

    /*  
		nama fungsi : hapus_cetak_riwayat
		deskripsi : method untuk delete data pada tabel
	*/
    public function hapus_cetak_riwayat() {
        $hasil = $this->cetak_riwayat->hapus_cetak_riwayat();
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($hasil)); // perlu menggunakan fungsi json_encode() dikarenakan bawaan data-table
    }

}
