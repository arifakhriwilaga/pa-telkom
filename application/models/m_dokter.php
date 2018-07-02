<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_dokter extends CI_Model {
    var $table = 'dokter';

    // public function get_doctors() {
    //     $query = $this->db->get($this->table)->result();
    //     return $query;
    // }

    public function get_doctors() {
    // public function ambil_dokter(){
        // $this->db->get($this->table)->result();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level_user', 'dokter');
        $query = $this->db->get()->result();
        return $query;
        // $this->db->like('gejala', $keyword);
    }
}
