<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CetakRiwayat extends CI_Model {

    public function submit($id_pengguna) {
        $data = array(
            'id_pengguna' => $id_pengguna
        );
        $this->db->insert('cetak_riwayat', $data);
    }
    
}
