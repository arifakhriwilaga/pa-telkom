<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*  
	** NOTE c_cetak_riwayat **
	list fungsi bawaan PHP :
	- json_encode ()
	- preg_split ()
	- strval ()
	- array ()
	- empty ()
*/
class c_akun_manajemen extends CI_Controller {

    /*  
		nama fungsi : __construct
		deskripsi : method awal untuk pengambilan data user, history login dan untuk kebutuhan pengecekan level user.
	*/
    public function __construct() {
        parent::__construct(); // pemanggilan method default parent

		// pemanggilan model yang dibutuhkan
        $this->load->model('m_akun', 'accounts');

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
        $page_title = "Kelola Akun";
        
		// data yang akan ditampilkan pada html dimasukan kedalam array        
        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/akun/v_akun',
            '_js' => 'assets/js/cms/akun/akun.js'
        );

        $this->load->view('cms/v_base', $data);
    }

    /*  
		nama fungsi : ambil_account
		deskripsi : method untuk et data dari db
	*/
    public function ambil_akun() {
        $list = $this->accounts->get_accounts();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $accounts) {
            $no++;
            $row = array();
            $row[] = $accounts->id_user;
            $row[] = $accounts->nama_user;
            $row[] = $accounts->email;
            $row[] = $accounts->jk_user == 'male' ? 'Laki-laki' : 'Perempuan';
            $row[] = date('d/m/Y', strtotime($accounts->tgl_lahir)) ;
            $row[] = $accounts->username;
            $row[] = '<button class="btn btn-danger btn-sm delete-acc" id="' . $accounts->id_user . '" data-name="' . $accounts->username . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';

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

    /*  
		nama fungsi : hapus_akun
		deskripsi : method untuk delete data pada tabel
	*/
    public function hapus_akun() {
        $result = $this->accounts->delete_account();
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

}
