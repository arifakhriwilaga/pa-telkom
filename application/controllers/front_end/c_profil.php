<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_profil extends CI_Controller {
	public $user_temp;
    
	public function __construct() {
        parent::__construct();
        $this->load->model('m_user', 'user');
        $this->load->library('upload');
        $this->user_temp = $this->session->userdata('user');
        if (empty($this->user_temp)) {
            redirect('masuk-akun');
        }
        if ($this->user_temp['level_user'] == 'admin') {
            redirect('dasbor');
        }
    }

	public function index()	{
		$page_title = "Edit Profile";
		$data = array(
			'page_title' => $page_title,
            '_content' => 'front_end/pengguna/v_ubah_profil',
            '_js' => array(
                        'assets/js/front_end/pengguna/ubah_profil.js',
                        'assets/includes/jquery-form/dist/jquery.form.min.js'
                    )
		);

		$this->load->view('front_end/v_base',$data);
	}

    public function update_profil($id_user) {
        $foto;
        $config['upload_path'] = './uploads/foto/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
	    $config['overwrite'] = TRUE; 
	    $config['file_name'] = $this->user_temp['nama_user']. "_foto_profil_" . date('Ymdhis'); // nama yang terupload

	    $this->upload->initialize($config);
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
        
        $result = $this->user->update($id_user, $foto);

        if ($result['status']) {    
            $user = $this->user->mengambil_user($id_user);
            $this->session->set_userdata('user', $user);
            $this->session->set_flashdata('success', $result['message']);
            return redirect('ubah-profil');

        } else {
            $this->session->set_flashdata('error', $result['message']);
            return redirect('ubah-profil');
        }
    }
}