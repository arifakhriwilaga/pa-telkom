<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_dokter extends CI_Model {
    var $table = 'dokter';

    public function get_doctors() {
        $query = $this->db->get($this->table)->result();
        return $query;
    }
}
