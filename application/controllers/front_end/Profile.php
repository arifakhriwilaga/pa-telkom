<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('Accounts', 'account');
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
            'user' => $this->session->userdata('user')
		);

		$this->load->render('front_end/user/edit_profile',$data);
	}

    public function update_profile($user_id) {
        $result = $this->account->update($user_id);
        if ($result['status']) {
            $this->session->userdata = array();
            $user = array(
                'user_id' => $result['data']->user_id,
                'username' => $result['data']->username,
                'name' => $result['data']->name,
                'email' => $result['data']->email,
                'gender' => $result['data']->gender,
                'born_date' => $result['data']->born_date,
                'password' => $result['data']->password,
                'level_user' => $result['data']->level_user,
                'created_date' => $result['data']->created_date
            );
            $this->session->set_userdata('user', $user);
            $this->session->set_flashdata('success', $result['message']);
            return redirect('ubah-profil');
        } else {
            $this->session->set_flashdata('error', $result['message']);
            
            return redirect('ubah-profil');
        }
    }

    public function upload_picture($id) {
        $json['status'] = 'error';
        if (file_exists($_FILES['profile_picture']['tmp_name'])) {
            $params['user_id'] = $id;
            $user = $this->api->get_user($id);
            if (file_exists('.'.$user['profile_picture'])) {
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
                $params['profile_picture'] = '/uploads/profile_picture/' . $uploaded['file_name'];
                $result = $this->api->set_user($this->_user['user_id'], $params);
                if ($result) {
                    $user = $this->api->get_user($id);
                    $newdata = array(
                        'userIncubatorLogin' => $user
                    );
                    $this->session->set_userdata($newdata);
                    $json['status'] = 'success';
                } else {
                    $json['message'] = $this->api->get_error_msg();
                }
            } else {
                $json['message'] = $this->upload->display_errors();
            }
        }
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($json));
    }
}