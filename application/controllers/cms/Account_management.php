<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_management extends CI_Controller {

    public $user;

    public function __construct() {
        parent::__construct();
        $this->load->model('Accounts', 'accounts');
        $this->user = $this->session->userdata('user');
        if (empty($this->user) || $this->user['level_user'] == 'user') {
            redirect('/');
        }
      }

    public function index() {
        $page_title = "Kelola Akun";
        $data = array(
            'page_title' => $page_title,
            'user' => $this->user
        );

        $this->load->render('cms/account/account', $data);
    }

    public function get_accounts() {
        $list = $this->accounts->get_accounts();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $accounts) {
            $no++;
            $row = array();
            $row[] = $accounts->user_id;
            $row[] = $accounts->name;
            $row[] = $accounts->email;
            $row[] = $accounts->gender;
            $row[] = $accounts->born_date;
            $row[] = $accounts->username;
            $row[] = '<button class="btn btn-danger btn-sm delete-acc" id="' . $accounts->user_id . '" data-name="' . $accounts->username . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->accounts->count_all(),
            "recordsFiltered" => $this->accounts->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function delete_account() {
        $result = $this->accounts->delete_account();
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

}
