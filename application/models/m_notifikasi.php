<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_notifikasi extends CI_Model {

    var $user;

    public function __construct() {    
        $this->user = $this->session->userdata('user');

    }

    var $tabel = 'konsul_dokter';
    //set column field database for datatable orderable
    var $urutan_kolom = array(null, null, null, 'pertanyaan_konsul', 'status_pertanyaan', 'jawaban_konsul', null);
    //set column field database for datatable searchable 
    var $pencarian_kolom = array('pertanyaan_konsul', 'jawaban_konsul');
    // default order 
    var $urutan = array('id_konsul' => 'asc');


    private function _get_notifications_query() {

        $this->db->select('konsul_dokter.*, CONCAT(user.nama_user) AS name, CONCAT(user.username) AS username');
        $this->db->from('konsul_dokter');
        $this->db->where('konsul_dokter.id_dokter', $this->user['id_user']);
        $this->db->join('user', 'konsul_dokter.id_user = user.id_user', 'left');
        $i = 0;

        foreach ($this->pencarian_kolom as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->pencarian_kolom) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->urutan_kolom[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->urutan)) {
            $urutan = $this->urutan;
            $this->db->order_by(key($urutan), $urutan[key($urutan)]);
        }
    }

    function get_notifications() {
        $this->_get_notifications_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_notifications_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->tabel);
        return $this->db->count_all_results();
    }

    public function delete_notification() {
        $result = array();
        $id_konsul = $this->input->post('id_konsul');
        $this->db->where('id_konsul', $id_konsul);

        if ($this->db->delete($this->tabel)) {
            $result = array(
                'status' => true,
                'message' => 'Akun berhasil dihapus!',
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
    }

    public function post_answer($data = []) {
        $query = $this->db->where('id_konsul', $data['id_konsul']);
        if ($this->db->update($this->tabel, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Jawaban berhasil disimpan!',
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
    }

    public function update_answer($data = []) {
        $query = $this->db->where('id_konsul', $data['id_konsul']);
        if ($this->db->update($this->tabel, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Jawaban berhasil diubah!',
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
    }

    public function send_answer($data = []) {
        $this->db->where('id_konsul', $data['id_konsul']);
        if ($this->db->update($this->tabel, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Jawaban berhasil dikirim!',
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
    }
    
    public function get_all($id_user) {
        $this->db->select('konsul_dokter.*, CONCAT(user.nama_user) AS dokter');
        $this->db->from('konsul_dokter');
        $this->db->join('user', 'user.id_user = konsul_dokter.id_dokter AND konsul_dokter.id_user = '.$id_user, 'left');
        // $this->db->where('konsul_dokter.status_kirim', 'true');
        $this->db->where('konsul_dokter.id_user', $id_user);
        $this->db->order_by('konsul_dokter.tgl_konsul', 'DESC');
        $query = $this->db->get();
        // var_dump($query->result());exit();
        return $query->result();
    }
    
    public function detail($id) {
        $this->db->select('konsul_dokter.*, CONCAT(user.nama_user) AS dokter');
        $this->db->from('konsul_dokter');
        $this->db->join('user', 'user.id_user = konsul_dokter.id_dokter', 'left');
        $this->db->where('konsul_dokter.id_konsul', $id);
        $query = $this->db->get();
        $sql = $this->db->last_query();
        return $query->result();
    }
    
    public function read_notif($id) {
        $this->db->where('id_konsul', $id);
        $this->db->update($this->tabel, array('status_baca' => 'true'));
    }
    
    public function count_notif($id_user) {
        $query = $this->db->get_where($this->tabel, array('id_user' => $id_user, 'status_baca' => 'false', 'status_kirim' => 'true'));
        return $query->num_rows();
    }
}
    