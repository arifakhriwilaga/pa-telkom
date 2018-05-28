<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifications extends CI_Model {

<<<<<<< Updated upstream
    var $table = 'consul_doctors';
=======
    public function __construct() {    }

    var $tabel = 'consul_doctors';
>>>>>>> Stashed changes
    //set column field database for datatable orderable
    var $urutan_kolom = array(null, null, null, 'questions', 'answer_status', 'answer', null);
    //set column field database for datatable searchable 
    var $pencarian_kolom = array('questions', 'answer');
    // default order 
    var $urutan = array('consul_id' => 'asc');


    private function _get_notifications_query() {

        $this->db->select('consul_doctors.*, CONCAT(users.name) AS name, CONCAT(users.username) AS username');
        $this->db->from('consul_doctors');
        $this->db->join('users', 'consul_doctors.user_id = users.user_id', 'left');
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
        $consul_id = $this->input->post('consul_id');
        $this->db->where('consul_id', $consul_id);

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
        $query = $this->db->where('consul_id', $data['consul_id']);
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

    public function send_answer($data = []) {
        $this->db->where('consul_id', $data['consul_id']);
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
    
    public function get_all($user_id) {
        $this->db->select('consul_doctors.*, CONCAT(doctors.name) AS doctor');
        $this->db->from('consul_doctors');
        $this->db->join('doctors', 'doctors.doctor_id = consul_doctors.doctor_id AND consul_doctors.user_id = '.$user_id, 'left');
        $this->db->where('consul_doctors.send_status', 'true');
        $this->db->where('consul_doctors.user_id', $user_id);
        $this->db->order_by('consul_doctors.created_date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function detail($id) {
        $this->db->select('consul_doctors.*, CONCAT(doctors.name) AS doctor');
        $this->db->from('consul_doctors');
        $this->db->join('doctors', 'doctors.doctor_id = consul_doctors.doctor_id', 'left');
        $this->db->where('consul_doctors.consul_id', $id);
        $query = $this->db->get();
        $sql = $this->db->last_query();
        return $query->result();
    }
    
    public function read_notif($id) {
        $this->db->where('consul_id', $id);
        $this->db->update($this->tabel, array('read_status' => 'true'));
    }
    
    public function count_notif($user_id) {
        $query = $this->db->get_where($this->tabel, array('user_id' => $user_id, 'read_status' => 'false'));
        return $query->num_rows();
    }
}
    