
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Model {
    var $table = 'users';

    public function login() {
        $result = array();
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $q_username = $this->db->get_where($this->table, array('username' => $username))->row();
        if (!$q_username) {
            $result = array(
                'status' => false,
                'message' => 'Nama pengguna tidak ada!',
                'data' => null
            );
            return $result;
        }

        $q_userpass = $this->db->get_where($this->table, array('username' => $username,'password' => md5($password)))->row();
        if (!$q_userpass) {
            $result = array(
                'status' => false,
                'message' => 'Kata sandi salah!',
                'data' => null
            );
            return $result;
        }

        // config create cookie
        $key = random_string('alnum', 64);
        set_cookie('lrmps', $key, 3600*24*30); // set expired 30 days
        
        $remember_me = $this->input->post('remember_me') == 'on' ? true : false;
        $data = array(
            'remember' => $remember_me, 
            'cookie' => $remember_me ? $key : ''
        );

        $this->db->where('username', $username);
        $this->db->update($this->table, $data);

        $result = array(
            'status' => true,
            'message' => 'Login berhasil!',
            'data' => $q_userpass
        );
        return $result;
    }

    public function save() {
        $result = array();
        $date = preg_split('/\//', strval($this->input->post('born_date')));
        $born_date = $date[2] . '-' . $date[1] . '-' . $date[0];
        $data = array(
            "username" => $this->input->post('username'),
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "born_date" => $born_date,
            "gender" => $this->input->post('gender'),
            "password" => md5($this->input->post('password')),
            "level_user" => $this->input->post('level_user')
        );
        if ($this->db->insert($this->table, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Selamat akun anda berhasil dibuat silahkan login!',
                'data' => null
            );
            return $result;
        } else {
            $error = $this->db->error();
            $result = array(
                'status' => false,
                'message' => $error['message'],
                'data' => null
            );
            return $result;
        }
    }

    public function reset_password() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $data = array(
            'password' => $password
        );

        $username = $this->db->where('username', $username);
        if (!$username) {
            $result = array(
                'status' => false,
                'message' => 'Nama pengguna tidak ada!',
                'data' => null
            );
            return $result;
        }
        
        $this->db->update($this->table, $data);
        $result = array(
            'status' => true,
            'message' => 'Kata sandi berhasil diubah, silahkan login!',
            'data' => null
        );
        return $result;
    }

}
