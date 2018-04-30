<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('User', 'user');
    $user = $this->session->userdata('user');
    if (empty($user)) {
    	redirect('masuk-akun');
    }
    if ($user['level_user'] == 'admin') {
    	redirect('dasbor');
    }
  }

	public function index()	{
		$page_title = "Edit Profile";
		$data = array(
			'page_title' => $page_title,
            '_content' => 'front_end/user/edit_profile',
            '_js' => array(
                        'assets/js/front_end/user/edit_profile.js',
                        'assets/includes/jquery-form/dist/jquery.form.min.js'
                    )
		);

		$this->load->view('front_end/base',$data);
	}

    public function update_profile($user_id) {
        $result = $this->user->update($user_id);
        if ($result['status']) {
            // $this->session->userdata = array();
            $user = $this->user->get_user($user_id);
            $this->session->set_userdata('user', $user);
            $this->session->set_flashdata('success', $result['message']);
            return redirect('ubah-profil');
        } else {
            $this->session->set_flashdata('error', $result['message']);
            
            return redirect('ubah-profil');
        }
    }

    public function upload_picture($id) {
        $result = array();
        if (file_exists($_FILES['profile_picture']['tmp_name'])) {
            $user = $this->session->userdata('user');
            if (file_exists('.'.$user['profile_picture'])) {
                chmod("." . $user['profile_picture'], 0777);
                unlink("." . $user['profile_picture']);
            }
            $config = array(
                'overwrite' => true,
                'allowed_types' => 'gif|jpg|png|jpeg',
                'upload_path' => './uploads/profile_picture/',
                'file_name' => $user['name'] . "profile_picture_" . date('Ymdhis')
            );

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('profile_picture')) {
                $uploaded = $this->upload->data();
                $picture['profile_picture'] = '/uploads/profile_picture/' . $uploaded['file_name'];
                $result = $this->user->update_picture($user['user_id'], $picture);
                if ($result['status']) {
                    $this->session->userdata = array();
                    $this->session->set_userdata('user', $this->user->get_user($id));
                }
            } else {
                $error = $this->upload->display_errors();
                $result = array(
                    'status' => false,
                    'message' => $error,
                    'data' => null
                );
            }
        } else {
            $result = array(
                'status' => false,
                'message' => 'Ukuran gambar tidak mendukung!',
                'data' => null
            );
        }
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }
}