
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Model {
    var $table = 'users';

    public function get_user($id) {
        $result = $this->db->where('user_id', $id)
                        ->get($this->table)
                        ->row();
        $user = array(
            'user_id' => $result->user_id,
            'username' => $result->username,
            'name' => $result->name,
            'email' => $result->email,
            'gender' => $result->gender,
            'born_date' => $result->born_date,
            'password' => $result->password,
            'level_user' => $result->level_user,
            'profile_picture' => $result->profile_picture,
            'created_date' => $result->created_date
        );
        return $user;
    }

    public function update($user_id) {
        $date = preg_split('/\//', strval($this->input->post('born_date')));
        $born_date = $date[2] . '-' . $date[1] . '-' . $date[0];
        $data = array(
            "username" => $this->input->post('username'),
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "gender" => $this->input->post('gender'),
            "born_date" => $born_date,
            "level_user" => $this->input->post('level_user')
        );
        if ($this->input->post('password')) {
            $data["password"] = md5($this->input->post('password'));
        }

        $this->db->where('user_id', $user_id);
        if ($this->db->update($this->table, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Profil berhasil diubah!',
                'data' => $this->db->get($this->table)->row()
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

    public function update_picture($user_id, $picture) {
        $this->db->where('user_id', $user_id);
        if ($this->db->update($this->table, $picture)) {
            $user = $this->get_user($user_id);
            $result = array(
                'status' => true,
                'message' => 'Foto profil berhasil diubah!',
                'data' => $user['profile_picture']
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

}
