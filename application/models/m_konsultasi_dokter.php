<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_konsultasi_dokter extends CI_Model {
    var $table = 'konsul_dokter';

    public function post() {
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'id_dokter' => $this->input->post('id_dokter'),
            'pertanyaan_konsul' => $this->input->post('pertanyaan_konsul'),
            'status_pertanyaan' => 'false',
            'status_kirim' => 'false',
            'status_baca' => 'false',
        );
 
        $result = $this->db->insert($this->table, $data);
        if ($result) {
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
