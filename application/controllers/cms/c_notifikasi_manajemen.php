<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_notifikasi_manajemen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_notifikasi', 'notifications');
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

    public function ambil_notifikasi() {
        $list = $this->notifications->get_notifications();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $notifications) {
            $no++;
            $row = array();
            $row[] = $notifications->id_konsul;
            $row[] = $notifications->name;
            $row[] = $notifications->username;
            $row[] = (strlen($notifications->pertanyaan_konsul) > 240 ? '<div style="max-height:150px;overflow-y:scroll;">' . replace_newline($notifications->pertanyaan_konsul) . '</div>' : replace_newline($notifications->pertanyaan_konsul));
            $row[] = $this->checkSend($notifications->status_notif, $notifications);
            $row[] = $this->checkAnswer($notifications->status_pertanyaan, $notifications);

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
        $button = '<button class="btn btn-danger btn-sm delete-acc" id="' . $data->id_konsul . '" data-name="' . $data->name . '" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
        if ($status == 'false') {
            $button .= '&nbsp;<button class="btn btn-success btn-sm" id="' . $data->id_konsul . '" data-name="' . $data->name . '" title="Jawab" onclick="tampilkanMJawaban(' . $data->id_konsul . ')">'
                    . '<i class="fa fa-share"></i>'
                    . '</button>';
        } else if($status == 'true' && $data->status_notif == 'pertanyaan') {
            $button .= '&nbsp;<button class="btn btn-default btn-sm edit" id="' . $data->id_konsul . '" data-name="' . $data->name . '" data-answer="' . $data->jawaban_konsul . '" title="Edit" onclick="tampilkanMEditJawaban(' . $data->id_konsul . ')">'
                    . '<i class="fa fa-pencil"></i>'
                    . '</button>';
        }
        return $button;
    }

    public function checkSend($status = '', $data = '') {
        $result = '';
        $style = '';
        if ($status == 'pertanyaan' && $data->jawaban_konsul) {
            $result .= '<button class="btn btn-info btn-sm pull-right btn-send-answer" id="' . $data->id_konsul . '" data-name="' . $data->name . '" title="Kirim">'
                    . '<i class="fa fa-send"></i>'
                    . '</button>';
            $style = "width:85%;";
        }
        $result .= (strlen($data->jawaban_konsul) > 240 ? '<div style="'. $style .'max-height:150px;overflow-y:scroll;">' . $data->jawaban_konsul . '</div>' : $data->jawaban_konsul);
        return $result;
    }

    public function buat_jawaban() {
        $data = array(
            "id_konsul" => $this->input->post('id_konsul'),
            "jawaban_konsul" => addslashes($this->input->post('jawaban_konsul')),
            "status_pertanyaan" => 'true'
        );
        $result = $this->notifications->post_answer($data);
        if ($result['status']) {
            $this->session->set_flashdata('success', $result['message']);
        } else {
            $this->session->set_flashdata('error', $result['message']);
        }
        return redirect('kelola-notifikasi');
    }

    public function rubah_jawaban() {
        $data = array(
            "id_konsul" => $this->input->post('edit_id_konsul'),
            "jawaban_konsul" => addslashes($this->input->post('edit_jawaban_konsul'))
        );
        $result = $this->notifications->update_answer($data);
        if ($result['status']) {
            $this->session->set_flashdata('success', $result['message']);
        } else {
            $this->session->set_flashdata('error', $result['message']);
        }
        return redirect('kelola-notifikasi');
    }

    public function hapus_notifikasi() {
        $result = $this->notifications->delete_notification();
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }
    
    public function kirim_jawaban() {
        $data = array(
            "id_konsul" => $this->input->post('id_konsul'),
            "status_notif" => 'kirim',
            "tgl_kirim" => date('Y-m-d H:i:s')
        );
        $result = $this->notifications->send_answer($data);
        $this->output
                ->set_content_type('json')
                ->set_output(json_encode($result));
    }

}
