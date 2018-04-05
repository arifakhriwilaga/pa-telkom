<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctors extends CI_Model {
    var $table = 'doctors';

    public function get_doctors() {
        $query = $this->db->get($this->table)->result();
        return $query;
    }
}
