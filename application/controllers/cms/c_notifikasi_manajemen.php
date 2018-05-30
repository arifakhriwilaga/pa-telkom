<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_notifikasi_manajemen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Notifications', 'notifications');
        $user = $this->session->userdata('user');
        if (empty($user) || $user['level_user'] == 'user') {
            redirect('/');
        }
    }

    public function index() {
        $page_title = "Kelola Notifikasi";
        $data = array(
            'page_title' => $page_title,
            '_content' => 'cms/notifikasi/v_notifikasi',
            '_css' => 'assets/css/cms/notifikasi/notifikasi.css',
            '_js' => 'assets/js/cms/notifikasi/notifikasi.js'
        );

        $this->load->view('cms/v_base', $data);
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

    public function checkAnswer($status = '', $data = '') {
        $button = '<button class="btn btn-danger btn-sm delete-acc" id="' . $data->consul_id . '" data-name="' . $data->name . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
        if ($status == 'false') {
            $button .= '&nbsp;<button class="btn btn-success btn-sm" id="' . $data->consul_id . '" data-name="' . $data->name . '" title="Jawab" onclick="showModal(' . $data->consul_id . ')">'
                    . '<i class="fa fa-share"></i>'
                    . '</button>';
        } else if($status == 'true' && $data->send_status == 'false') {
            $button .= '&nbsp;<button class="btn btn-default btn-sm edit" id="' . $data->consul_id . '" data-name="' . $data->name . '" data-answer="' . $data->answer . '" title="Edit" onclick="editModal(' . $data->consul_id . ')">'
                    . '<i class="fa fa-pencil"></i>'
                    . '</button>';
        }
        return $button;
    }

    public function checkSend($status = '', $data = '') {
        $result = '';
        $style = '';
        if ($status == 'false' && $data->answer) {
            $result .= '<button class="btn btn-info btn-sm pull-right btn-send-answer" id="' . $data->consul_id . '" data-name="' . $data->name . '" title="Jawab">'
                    . '<i class="fa fa-send"></i>'
                    . '</button>';
            $style = "width:85%;";
        }
        $result .= (strlen($data->answer) > 240 ? '<div style="'. $style .'max-height:150px;overflow-y:scroll;">' . $data->answer . '</div>' : $data->answer);
        return $result;
    }

    public function post_answer() {
        $data = array(
            "consul_id" => $this->input->post('consul_id'),
            "answer" => addslashes($this->input->post('answer')),
            "answer_status" => 'true'
        );
        $result = $this->notifications->post_answer($data);
        if ($result['status']) {
            $this->session->set_flashdata('success', $result['message']);
        } else {
            $this->session->set_flashdata('error', $result['message']);
        }
        return redirect('kelola-notifikasi');
    }

    public function update_answer() {
        $data = array(
            "consul_id" => $this->input->post('edit_consul_id'),
            "answer" => addslashes($this->input->post('edit_answer'))
        );
        $result = $this->notifications->update_answer($data);
        if ($result['status']) {
            $this->session->set_flashdata('success', $result['message']);
        } else {
            $this->session->set_flashdata('error', $result['message']);
        }
        return redirect('kelola-notifikasi');
    }

    public function delete_notification() {
        $result = $this->notifications->delete_notification();
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }
    
    public function send_answer() {
        $data = array(
            "consul_id" => $this->input->post('consul_id'),
            "send_status" => 'true',
            "read_status" => 'false',
            "answer_date" => date('Y-m-d H:i:s')
        );
        $result = $this->notifications->send_answer($data);
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

}