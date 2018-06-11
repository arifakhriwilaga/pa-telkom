<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_periksa extends CI_Model {

    public function cari_gejala($keyword = '') {
        $this->db->select('*');
        $this->db->from('penyakit');
        $this->db->like('penyakit', $keyword);
        return $this->db->get()->result_array();
    }

    public function ambil_gejala() {
        $query = $this->db->get('gejala')->result();
        return $query;
    }

    public function ambil_gejala_dengan_id($id) {
    	$result = $this->db->where('id_gejala', $id)
                        ->get('gejala')
                        ->row();
		return $result;
    }

    public function pemeriksaan_dengan_id_gejala($id) {
    	$result = $this->db->where('id_gejala', $id)
                        ->get('tahap_pemeriksaan')
                        ->row();
		return $result;
    }

    public function pemeriksaan_dengan_status_muncul_setelah_id_pemeriksaan($id, $status) {
    	$result = $this->db
						->get_where('tahap_pemeriksaan', array('status_muncul_setelah_id_pemeriksaan' => $id, 'status' => $status))
						->row();
		return $result;
    }

    public function ambil_penyakit_dengan_id($id) {
    	$result = $this->db->where('id_penyakit', $id)
                        ->get('penyakit')
                        ->row();
		return $result;
    }

    public function simpan_periksa($id_user, $id_penyakit) {
        $data = array(
            'id_user' => $id_user,
            'id_penyakit' => $id_penyakit
        );
        $this->db->insert('periksa', $data);
    }

    public function hasil_periksa($id_user) {
        $periksa = $this->db->where('id_user', $id_user)
                        ->order_by('tanggal_dibuat', 'DESC')
                        ->limit(1)
                        ->get('periksa')
                        ->row();
        $penyakit = $this->ambil_penyakit_dengan_id($periksa->id_penyakit);
        return $penyakit;
    }

    public function checkup_by_id($id) {
    	$result = $this->db->where('id_gejala', $id)
                        ->get('tahap_pemeriksaan')
                        ->row();
		return $result;
    }

    var $order = array('id' => 'asc');

    private function _get_kunjungan_query($id_user) {

        $this->db->select('*');
        $this->db->from('periksa');
        $this->db->where('id_user', $id_user);

        if ($_POST['search']['value']) { // if datatable send POST for search
            $this->db->like('tanggal_dibuat', $_POST['search']['value']);
        }
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }

    function ambil_kunjungan($id_user) {
        $this->_get_kunjungan_query($id_user);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id_user) {
        $this->_get_kunjungan_query($id_user);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from('periksa');
        return $this->db->count_all_results();
    }

    private function _get_konsultasi_query($id_user) {
        $this->db->select('periksa.*, CONCAT(user.nama_user) AS nama_user, CONCAT(penyakit.penyakit) AS penyakit, CONCAT(penyakit.solusi_solusi) AS solusi_solusi');
        $this->db->from('periksa');
        $this->db->join('user', 'user.id_user = periksa.id_user', 'left');
        $this->db->join('penyakit', 'penyakit.id_penyakit = periksa.id_penyakit', 'left');
        $this->db->where('periksa.id_user', $id_user);

        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }

    public function ambil_detail_konsultasi($id_user = null){
        $this->_get_konsultasi_query($id_user);
        
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_detail_filtered($id_user = null) {
        $this->_get_konsultasi_query($id_user);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_detail_all($id_user = null) {
        $this->db->select('*');
        $this->db->from('periksa');
        $this->db->where('id_user', $id_user);        
        return $this->db->count_all_results();
    }

    public function delete_all_konsultasi($id_user = null) {
        $this->db->select('*');
        $this->db->from('periksa');
        $this->db->where('id_user', $id_user);
        $result_query = $this->db->get()->result();
        $count_all = count($result_query);
        $no = 0;
        
        if($count_all > 0) {
            foreach ($result_query as $value) {
                $this->db->select('*');
                $this->db->from('periksa');
                $this->db->where('id_user', $value->id_user);
                if ($this->db->delete('periksa')) {
                    $no++;
                } else {
                    $error = $this->db->error();
                }
            }
            
            if ($no == $count_all) {
                $result = array(
                    'status' => true,
                    'message' => 'Konsultasi berhasil dihapus!',
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
        } else {
            $result = array(
                'status' => false,
                'message' => "User belum melakukan konsultasi",
                'data' => null
            );
            return $result;
        }
    }
}
