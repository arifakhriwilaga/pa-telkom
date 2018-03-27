<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifications extends CI_Model {

    public function __construct() {
        // parent::__construct();
        // $user = $this->session->userdata('user');
        // if ($user['level_user'] == 'admin') {
        //     redirect('dasbor');
        // }
        // var_dump($this->db->from($this->table));exit();
    }

    var $table = 'consul_doctors';
    //set column field database for datatable orderable
    var $column_order = array(null, null, null, 'questions', 'answer_status', 'answer',null);
    //set column field database for datatable searchable 
    var $column_search = array('questions', 'answer');
    // default order 
    var $order = array('consul_id' => 'asc');

    private function _get_notifications_query() {

        $this->db->select('consul_doctors.*, CONCAT(users.name) AS name, CONCAT(users.username) AS username');    
        $this->db->from('consul_doctors');
        $this->db->join('users', 'consul_doctors.user_id = users.user_id', 'left');   
        // var_dump($query);die();
        $i = 0;

        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    // var_dump($this->db->group_start());die();
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                    // var_dump($this->db->like($item, $_POST['search']['value']));die();
                } else {
                    // var_dump($this->db->or_like($item, $_POST['search']['value']));die();
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    // var_dump($this->db->group_end());die();
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function delete_notifications() {
        $result = array();
        $user_id = $this->input->post('user_id');
        $this->db->where('user_id', $user_id);

        if ($this->db->delete($this->table)) {
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

    public function post($data=[])
    {
        $query = $this->db->where('consul_id',$data['consul_id']);
        if ($this->db->update($this->table, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Jawaban berhasil disimpan',
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

}
