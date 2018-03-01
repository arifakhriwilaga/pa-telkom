
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Model {
    var $table = 'users';

    public function login() {
        $result = array();
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $username = $this->db->where('username', $username);;
        if (!$username) {
            $result = array(
                'status' => false,
                'message' => 'Nama pengguna tidak ada!',
                'data' => null
            );
            return $result;
        }

        $this->db->where('password', md5($password));
        $query = $this->db->get($this->table);
        if ($query->num_rows() == 0) {
            $result = array(
                'status' => false,
                'message' => 'Kata sandi salah!',
                'data' => null
            );
            return $result;
        }

        $result = array(
            'status' => true,
            'message' => 'Login berhasil!',
            'data' => $query->row()
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
