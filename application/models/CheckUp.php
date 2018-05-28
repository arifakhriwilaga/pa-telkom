<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CheckUp extends CI_Model {

    public function get_symptoms() {
        $query = $this->db->get('symptoms')->result();
        return $query;
    }

    public function get_symptom($id) {
    	$result = $this->db->where('id', $id)
                        ->get('symptoms')
                        ->row();
		return $result;
    }

    public function checkup_by_id($id) {
    	$result = $this->db->where('id', $id)
                        ->get('step_checkup')
                        ->row();
		return $result;
    }

    public function checkup_by_symptom_id($id) {
    	$result = $this->db->where('symptom_id', $id)
                        ->get('step_checkup')
                        ->row();
		return $result;
    }

    public function checkup_by_parent_id($id, $status) {
    	$result = $this->db
						->get_where('step_checkup', array('parent_id' => $id, 'status' => $status))
						->row();
		return $result;
    }

    public function get_sickness_by_id($id) {
    	$result = $this->db->where('id', $id)
                        ->get('sickness')
                        ->row();
		return $result;
    }

    public function pos_periksa($id_pengguna, $id_penyakit) {
        $data = array(
            'id_pengguna' => $id_pengguna,
            'id_penyakit' => $id_penyakit
        );
        $this->db->insert('periksa', $data);
    }

    public function hasil_periksa($id_pengguna) {
        $periksa = $this->db->where('id_pengguna', $id_pengguna)
                        ->order_by('tanggal_dibuat', 'DESC')
                        ->limit(1)
                        ->get('periksa')
                        ->row();
        $penyakit = $this->get_sickness_by_id($periksa->id_penyakit);
        return $penyakit;
    }
}
