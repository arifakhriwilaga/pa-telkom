<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_management extends CI_Controller {

    var $tempAnswer;

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
        $this->db->select('consul_doctors.*, CONCAT(users.name) AS name, CONCAT(users.username) AS username');    
        $this->db->from('consul_doctors');
        $this->db->join('users', 'consul_doctors.user_id = users.user_id', 'left');
        $query = $this->db->get();  
        // var_dump($query);die();

		$data = array(
			'page_title' => $page_title,
			'_content' => 'cms/notification/notification',
			'_js' => 'assets/js/cms/notification/notification.js',
            'query' => $query
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
            $row[] = $notifications->name;
            $row[] = $notifications->username;
            $row[] = $notifications->questions;
            $row[] = $notifications->answer;
            $row[] = $this->checkAnswer($notifications->answer_status, $notifications);

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->notifications->count_all(),
            "recordsFiltered" => $this->notifications->count_filtered(),
            "data" => $data,
            "data_answer" => $this->tempAnswer
        );
        echo json_encode($output);
    }

    public function checkAnswer($status = '', $data = '')
    {
        // var_dump($status);die();
        if ($status == 'false') {
            return '<button class="btn btn-danger btn-sm delete-acc" id="' . $data->consul_id . '" data-name="' . $data->questions . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button> <button class="btn btn-success btn-sm" id="' . $data->consul_id . '" data-name="' . $data->questions .'" title="Jawab" onclick="showModal('. $data->consul_id .')"><i class="fa fa-share"></i></button>';
        } else {
            return '<button class="btn btn-danger btn-sm delete-acc" id="' . $data->consul_id . '" data-name="' . $data->questions . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
        }
    }

    public function post_answer()
    {   
        $data = array(
            "consul_id" => $this->input->post('consul_id'),
            "answer" => $this->input->post('answer'),
            "answer_status" => 'true'
        );

        $this->tempAnswer = $data;

        $result = $this->notifications->post($data);
        $this->output
                ->set_content_type('json')
                // ->set_output(json_encode($result));
                ->set_output(json_encode($this->tempAnswer));
    }
}
