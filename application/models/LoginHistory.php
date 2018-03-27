
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoginHistory extends CI_Model {
    // initial variable
    var $table = 'login_histories';
    var $q_check_duplicate = "SELECT * FROM login_histories WHERE created_date LIKE ?";

    public function get_history($id) {
        $result = $this->db->query("SELECT * FROM login_histories ORDER BY created_date DESC LIMIT 5")->result();
        return $result;
    }

    
    public function get_duplicate_consul() {
        // for test
        // $result = $this->db->query($this->q_check_duplicate, array("%".date('2018-04-24')."%"))->result() ;
        $result = $this->db->query($this->q_check_duplicate, array("%".date('Y-m-d')."%"))->result() ;
        return $result;
    }

    public function post($user_id) {
        $data = array(
            "user_id" => $user_id,
            "created_date" => date('Y-m-d H:i')
            // "created_date" => date('2018-04-24 00:00'), // for test
        );

        if (count($this->get_duplicate_consul()) < 1) {

            if ($this->db->insert($this->table, $data)) {
                return $result = true;
            } else {
                $error = $this->db->error();
                return $result = false;
            }

        }  else {
            
            $query = $this->db->where('login_history_id',$this->get_duplicate_consul()[0]->login_history_id);
            if ($this->db->update($this->table, $data)) {
                return $result = true;
            } else {
                $error = $this->db->error();
                return $result = false;
            }
        }     
    }
}
