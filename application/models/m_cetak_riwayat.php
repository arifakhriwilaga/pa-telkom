<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*  
    ** NOTE m_cetak_riwayat **
    list fungsi bawaan PHP :
    - date ()
    - array ()
*/
class m_cetak_riwayat extends CI_Model {

    // variable untuk set nama table dan config untuk kebutuhan search, sort, dan order default pada tabel index   
    var $tabel = 'cetak_riwayat';
    var $kolom_urutan = array(null, 'name', 'username', 'tanggal_dibuat');
    var $kolom_pencarian = array('name', 'username', 'tanggal_dibuat');
    var $order = array('id' => 'asc');


    private function _get_riwayat_query() {

        $this->db->select('cetak_riwayat.*, CONCAT(users.nama_user) AS name, CONCAT(users.username) AS username');
        $this->db->from('cetak_riwayat');
        $this->db->join('users', 'cetak_riwayat.id_pengguna = users.id_user', 'left');
        $i = 0;

        foreach ($this->kolom_pencarian as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->kolom_pencarian) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->kolom_urutan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered() {
        $this->_get_riwayat_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function count_all() {
        $this->db->from($this->tabel);
        return $this->db->count_all_results();
    }
    
    function ambil_cetak_riwayat() {
        $this->_get_riwayat_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function submit($id_pengguna) {
        $data = array(
            'id_pengguna' => $id_pengguna
        );
        $this->db->insert($this->tabel, $data);
    }

    public function hapus_cetak_riwayat() {
        $result = array();
        $id = $this->input->post('id');
        $this->db->where('id', $id);

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
}
