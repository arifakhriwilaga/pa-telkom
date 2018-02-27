<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accounts extends CI_Model {

    var $table = 'users';
    //set column field database for datatable orderable
    var $column_order = array(null, 'name', 'email', 'gender', 'born_date', 'username');
    //set column field database for datatable searchable 
    var $column_search = array('name', 'email', 'born_date', 'username');
    // default order 
    var $order = array('user_id' => 'asc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_accounts_query() {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
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

    function get_accounts() {
        $this->_get_accounts_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_accounts_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function delete_account() {
        $result = array();
        $user_id = $this->input->post('user_id');
        $this->db->where('user_id', $user_id);

        if ($this->db->delete($this->table)) {
            $result = array(
                'status' => true,
                'message' => 'Data berhasil dihapus!',
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
