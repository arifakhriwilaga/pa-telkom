<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CetakRiwayat extends CI_Model {

    var $table = 'cetak_riwayat';
    //set column field database for datatable orderable
    var $column_order = array(null, 'name', 'username', 'tanggal_dibuat');
    //set column field database for datatable searchable 
    var $column_search = array(null, 'name', 'username', 'tanggal_dibuat');
    // default order 
    var $order = array('id' => 'asc');


    private function _get_riwayat_query() {

        $this->db->select('cetak_riwayat.*, CONCAT(users.name) AS name, CONCAT(users.username) AS username');
        $this->db->from('cetak_riwayat');
        $this->db->join('users', 'cetak_riwayat.id_pengguna = users.user_id', 'left');
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

    function ambil_cetak_riwayat() {
        $this->_get_riwayat_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_riwayat_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function submit($id_pengguna) {
        $data = array(
            'id_pengguna' => $id_pengguna
        );
        $this->db->insert($this->table, $data);
    }

    public function hapus_cetak_riwayat() {
        $result = array();
        $id = $this->input->post('id');
        $this->db->where('id', $id);

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
}
