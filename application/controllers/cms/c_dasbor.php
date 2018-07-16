<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dasbor extends CI_Controller {
	private $born_date;
	public $user_temp;

	public function __construct() {
	parent::__construct();
	
    $this->load->model('m_history_login','login_history');
	$this->load->model('m_user', 'user');
	$this->load->library('upload');
	$this->user_temp = $this->session->userdata('user');
	if (empty($this->user_temp)) {
		redirect('masuk-akun');
	}
	$user = $this->session->userdata('user');
	// var_dump($user);exit();
    $this->born_date = date('d/m/Y', strtotime($user['tgl_lahir']));
    
    if (empty($user) || $user['level_user'] == 'user') {
    	redirect('/');
    }
  }

	public function index()	{
		$result = $this->login_history->mengambil_history($this->session->userdata('user')['id_user']);
		
		$login_histories = array();
		if (isset($result)) {
			foreach ($result as $key => $value) {
					$login_histories[] = array(
						'user_id' => $value->id_user,
						'date' => date('d/m/Y', strtotime($value->tgl_login)),
						'day' => $this->change_format_day(date('l', strtotime($value->tgl_login))),
						'time' => date('H.i', strtotime($value->tgl_login)),
					);
			}
		}

		$page_title = "Dasbor";

		$data = array(
			'page_title' => $page_title,
			'_content' => 'cms/dasbor/v_dasbor',
			'born_date' => $this->born_date,
			'login_histories' => $login_histories,
			'_js' => array(
				'assets/js/cms/dasbor/dasbor.js'
			)
		);

		$this->load->view('cms/v_base', $data);
	}

	public function update_profil($id_user) {
		// var_dump($foto);exit();
        $foto;
        $config['upload_path'] = './uploads/foto/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
	    $config['overwrite'] = TRUE; 
	    $config['file_name'] = $this->user_temp['nama_user']. "_foto_profil_" . date('Ymdhis'); // nama yang terupload

        $this->upload->initialize($config);
        // var_dump($_FILES['foto']['name']);exit();
        if (!empty($_FILES['foto']['name'])) {
            $user = $this->session->userdata('user');

            if ($this->upload->do_upload('foto')) {
                $uploaded = $this->upload->data();
                $foto = '/uploads/foto/' . $uploaded['file_name'];

            } else {
                $error = $this->upload->display_errors();
                $result = array(
                    'status' => false,
                    'message' => $error,
                    'data' => null
                );
            }
        } else {
            $foto = $this->user_temp['foto'];
        }
        
        $result = $this->user->update($id_user, $foto, 'dasbor');

        if ($result['status']) {    
            $user = $this->user->mengambil_user($id_user);
            $this->session->set_userdata('user', $user);
            $this->session->set_flashdata('success', $result['message']);
            return redirect('dasbor');

        } else {
            $this->session->set_flashdata('error', $result['message']);
            return redirect('dasborl');
        }
    }

	public function change_format_day($date) {
		switch ($date) {
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
