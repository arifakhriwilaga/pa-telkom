<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_akun_manajemen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_akun', 'accounts');
        $user = $this->session->userdata('user');
        if (empty($user) || $user['level_user'] == 'user') {
            redirect('/');
        }
      }

    public function index() {
        $page_title = "Kelola Akun";
        
        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/akun/v_akun',
            '_js' => 'assets/js/cms/akun/akun.js'
        );

        $this->load->view('cms/v_base', $data);
    }

    public function get_accounts() {
        $list = $this->accounts->get_accounts();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $accounts) {
            $date = preg_split('/\-/', strval($accounts->tgl_lahir));
            $born_date = $date[2] . '/' . $date[1] . '/' . $date[0];;
            
            $no++;
            $row = array();
            $row[] = $accounts->id_user;
            $row[] = $accounts->nama_user;
            $row[] = $accounts->email;
            $row[] = $accounts->jk_user == 'male' ? 'Laki-laki' : 'Perempuan';
            $row[] = $born_date ;
            $row[] = $accounts->username;
            $row[] = $this->check_level_user($accounts);

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

    public function hapus_akun() {
        $result = $this->accounts->delete_account();
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

    public function ganti_level(){
        $result = $this->accounts->ganti_level_akun();
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

    public function check_level_user($user) {
        // var_dump($user);exit();
        switch ($user->level_user) {
			case 'dokter':
				return '<button class="btn btn-info btn-sm change-level-acc" level_user="' . $user->level_user . '" id="' . $user->id_user . '" data-name="' . $user->username . '" title="Jadikan User"> Jadikan User</button> <button class="btn btn-danger btn-sm delete-acc" id="' . $user->id_user . '" data-name="' . $user->username . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
				break;
                default:
				return '<button class="btn btn-info btn-sm change-level-acc" level_user="' . $user->level_user . '" id="' . $user->id_user . '" data-name="' . $user->username . '" title="Jadikan Dokter"> Jadikan Dokter</button> <button class="btn btn-danger btn-sm delete-acc" id="' . $user->id_user . '" data-name="' . $user->username . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
				// return '<button class="btn btn-danger btn-sm delete-acc" id="' . $user->id_user . '" data-name="' . $user->username . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
				break;
		}
        
    }

}
