<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ConsulDoctor extends CI_Model {
    var $table = 'consul_doctors';

    public function post() {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'doctor_id' => $this->input->post('doctor_id'),
            'questions' => $this->input->post('question'),
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
