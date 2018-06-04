<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_konsultasi_manajemen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        if (empty($user) || $user['level_user'] == 'user') {
            redirect('/');
        }
    }

    public function index() {
        $page_title = "Konsultasi";

        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/konsultasi/v_konsultasi',
            '_js' => 'assets/js/cms/konsultasi/konsultasi.js'
        );

        $this->load->view('cms/base', $data);
    }

    public function ambil_konsultasi() {
        $list = $this->notifications->get_notifications();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $notifications) {
            $no++;
            $row = array();
            $row[] = $notifications->consul_id;
            $row[] = $notifications->name;
            $row[] = $notifications->username;
            $row[] = (strlen($notifications->questions) > 240 ? '<div style="max-height:150px;overflow-y:scroll;">' . $notifications->questions . '</div>' : $notifications->questions);
            $row[] = $this->checkSend($notifications->send_status, $notifications);
            $row[] = $this->checkAnswer($notifications->answer_status, $notifications);

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->notifications->count_all(),
            "recordsFiltered" => $this->notifications->count_filtered(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function detail_consul() {
        $page_title = "Detail Konsultasi";

        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/konsultasi/detail_konsultasi',
            '_js' => 'assets/js/cms/konsultasi/detail_konsultasi.js'
        );

        $this->load->view('cms/base', $data);
    }

}
