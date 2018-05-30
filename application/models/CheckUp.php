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


    var $order = array('id' => 'asc');

    private function _get_kunjungan_query($id_pengguna) {

        $this->db->select('*');
        $this->db->from('periksa');
        $this->db->where('id_pengguna', $id_pengguna);

        if ($_POST['search']['value']) { // if datatable send POST for search
            $this->db->like('tanggal_dibuat', $_POST['search']['value']);
        }
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }

    function ambil_kunjungan($id_pengguna) {
        $this->_get_kunjungan_query($id_pengguna);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id_pengguna) {
        $this->_get_kunjungan_query($id_pengguna);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from('periksa');
        return $this->db->count_all_results();
    }
}
