<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_management extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('Notifications','notifications');
    $user = $this->session->userdata('user');
    if (empty($user) || $user['level_user'] == 'user') {
    	redirect('/');
    }
  }

	public function index()	{
		$page_title = "Kelola Notifikasi";

		$data = array(
			'page_title' => $page_title,
			'_content' => 'cms/notification/notification',
			'_js' => 'assets/js/cms/notification/notification.js'
		);

		$this->load->view('cms/base', $data);
	}

	public function get_notifications() {
        $list = $this->notifications->get_notifications();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $notifications) {
            $no++;
            $row = array();
            $row[] = $notifications->consul_id;
            $row[] = $notifications->user_id;
            $row[] = $notifications->doctor_id;
            $row[] = $notifications->questions;
            $row[] = $notifications->answer_status;
            $row[] = $notifications->answer;
            $row[] = '<button class="btn btn-danger btn-sm delete-acc" id="' . $notifications->consul_id . '" data-name="' . $notifications->questions . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->notifications->count_all(),
            "recordsFiltered" => $this->notifications->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
}
