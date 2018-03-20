
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoginHistory extends CI_Model {
    var $table = 'login_histories';
    var $q_check_duplicate = "SELECT * FROM login_histories WHERE created_date LIKE ?";

    public function get_history($id) {
        $result = $this->db->query("SELECT * FROM login_histories ORDER BY created_date DESC LIMIT 5")->result();
        return $result;
    }

    
    public function get_duplicate_consul() {
        // $this->db->select('created_date');
        // $this->db->from('login_histories');
        // $result = $this->db->get();  // Produces: SELECT title, content, date FROM mytable

        // $result = $this->db->select($this->table,'created_date')->like(date('Y-m-d'))->get() ;
        $result = count($this->db->query($this->q_check_duplicate, array("%".date('Y-m-d')."%"))->result()) ;
        // $result = $this->db->query($this->q_check_duplicate, array("%".date('Y-m-d')."%"))->result() ;
        // var_dump($result);exit();
        return $result;
    }

    public function post($user_id) {
        if ($this->get_duplicate_consul() < 1) {
            $data = array(
                "user_id" => $user_id
            );

            if ($this->db->insert($this->table, $data)) {
                $result = true;
                return $result;
            } else {
                $error = $this->db->error();
                $result = false;
                return $result;
            }

        }  else {
            return true;
        }      
    }
}
