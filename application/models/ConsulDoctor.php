
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ConsulDoctor extends CI_Model {
    var $table = 'consul_doctors';

    public function post($id) {
        $data = array(
            'user_id' => $id,
            'doctor_id' => ($this->input->post('doctor_1') == "true" ? 1 : 2),
            'questions' => $this->input->post('questions'),
            'answer_status' => 'false'
        );
        if ($this->db->insert($this->table, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Pertanyaan berhasil dikirim!'
            );
            return $result;
        } else {
            $error = $this->db->error();
            $result = array(
                'status' => false,
                'message' => $error['message']
            );
            return $result;
        }
    }
}
