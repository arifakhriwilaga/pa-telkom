<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_akun extends CI_Model {

    var $table = 'user';
    //set column field database for datatable orderable
    var $column_order = array(null, 'nama_user', 'email', 'jk_user', 'tgl_lahir', 'username');
    //set column field database for datatable searchable 
    var $column_search = array('nama_user', 'email', 'tgl_lahir', 'username');
    // default order 
    var $order = array('id_user' => 'asc');

    private function _get_accounts_query($status_from = null) {
        // var_dump($status_from);exit();
        $this->db->from($this->table);
        if($status_from == null){
            $this->db->where('level_user !=', 'admin');
        } else {
            $this->db->where('level_user !=', 'admin');
            $this->db->where('level_user !=','dokter');
        }

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

    function get_accounts($status_from = null) {
        $this->_get_accounts_query($status_from);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($status_from = null) {
        $this->_get_accounts_query($status_from);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function delete_account() {
        $result = array();
        $id_user = $this->input->post('user_id');
        $this->db->where('id_user', $id_user);

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

    public function ganti_level_akun() {
        // $result = array();
        $id_user = $this->input->post('user_id');
        $this->db->where('id_user', $id_user);

        $data = array(
            "level_user" => $this->input->post('level') == 'user' ? 'dokter' : 'user',
        );

        if ($this->db->update($this->table, $data)) {
            $result = array(
                'status' => true,
                'message' => 'Level user berhasil dirubah!',
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
