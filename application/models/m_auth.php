<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*  
    ** NOTE m_history_login **
    list fungsi bawaan PHP :
    - date ()
    - md5 ()
    - preg_split ()
*/
class m_auth extends CI_Model {
    var $table = 'user'; // variable untuk set nama table

    /*  
		nama fungsi : login
		deskripsi : method untuk pengecekan login jika username dan password valid maka akan dikembalikan 'true' pada controller, sebaliknya jika salah akan mengembalikan 'false'
	*/
    public function login() {
        $result = array();
        $username = $this->input->post('username'); // mengambil value dari input username di html
        $password = $this->input->post('password'); // mengambil value dari input password di html

        // pengecekan username
        $q_username = $this->db->get_where($this->table, array('username' => $username))->row();
        if (!$q_username) {
            $result = array(
                'status' => false,
                'message' => 'Nama pengguna tidak ada!',
                'data' => null
            );
            return $result;
        }
        
        // pengecekan password jika username benar, fungsi md5() perlu digunakan untuk encrypt password
        $q_userpass = $this->db->get_where($this->table, array('username' => $username,'password' => md5($password)))->row();
        if (!$q_userpass) {
            $result = array(
                'status' => false,
                'message' => 'Kata sandi salah!',
                'data' => null
            );
            return $result;
        }

        // KONDISI JIKA USERNAME DAN PASSWORD VALID        
        // jika user mencentang 'remember_me' maka cookie akan disave
        // config untuk create cookie
        $key = random_string('alnum', 64);
        // set_cookie('lrmps', $key, 36*1); // set kedaluarsa 30 hari
        set_cookie('lrmps', $key, 3600*24*30); // set kedaluarsa 30 hari
        
        $remember_me = $this->input->post('remember_me') == 'on' ? true : false;
        $data = array(
            'remember' => $remember_me, 
            'cookie' => $key
        );

        $this->db->where('username', $username);
        $this->db->update($this->table, $data); // penyimpanan cookie dan status remember_me

        $result = array(
            'status' => true,
            'message' => 'Login berhasil!',
            'data' => $q_userpass
        );
        return $result;
    }

    /*  
		nama fungsi : simpan
		deskripsi : method untuk penyimpanan user baru
	*/
    public function simpan($foto_berkas = null,$nip = null) {
        $result = array();
        
        // merubah format tanggal lahir agar sesuai dengan db yaitu 'yyyy-mm-dd' 
        $date = preg_split('/\//', strval($this->input->post('tgl_lahir')));
        $born_date = $date[2] . '-' . $date[1] . '-' . $date[0];
        
        $data = array(
            "username" => $this->input->post('username'),
            "nama_user" => $this->input->post('nama_user'),
            "email" => $this->input->post('email'),
            "tgl_lahir" => $born_date,
            "jk_user" => $this->input->post('jk_user'),
            "password" => md5($this->input->post('password')),
            "level_user" => $this->input->post('level_user'),
            "nip" => $nip,
            "foto_berkas" => $foto_berkas

        );

        $q_username = $this->db->get_where($this->table, array('username' => $this->input->post('username')))->row();
        // var_dump($q_username);exit();
        if ($q_username) {
            $result = array(
                'status' => false,
                'message' => 'Nama pengguna sudah digunakan!',
                'data' => null
            );
            return $result;
        }

        // penyimpanan user, jika benar
        if ($this->db->insert($this->table, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Selamat akun anda berhasil dibuat silahkan login!',
                'data' => null
            );
            return $result;

        // mengembalikan message error, jika error
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

    /*  
		nama fungsi : reset_password
		deskripsi : method untuk mereset password
	*/
    public function reset_password() {
        $username = $this->input->post('username'); // mengambil value dari input username di html
        $password = md5($this->input->post('password')); // mengambil value dari input password di html kemudian diencrypt menggunakan fungsi md5
        $data = array(
            'password' => $password
        );

        // pengecekan jika username tidak ada
        $username = $this->db->where('username', $username);
        if (!$username) {
            $result = array(
                'status' => false,
                'message' => 'Nama pengguna tidak ada!',
                'data' => null
            );
            return $result;
        }
        
        // kondisi jika username ada dan password berhasil dirubah
        $this->db->update($this->table, $data);
        $result = array(
            'status' => true,
            'message' => 'Kata sandi berhasil diubah, silahkan login!',
            'data' => null
        );
        return $result;
    }

    public function remember_user($cookie) {
        $result = $this->db->get_where($this->table, array('cookie' => $cookie))->row();
        // var_dump($result->remember);exit();
        if($result->remember !== "0"){
            $this->login($result->username,$result->password);
        } else {
            // return $this->logout();
            return false;
        }
    }
    
    public function logout(){
        $this->session->userdata = array();
        $this->session->sess_destroy();
        return false;
        // var_dump('hello logout');exit();
    }

}
