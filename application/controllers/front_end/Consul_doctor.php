<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consul_doctor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        $this->load->model('ConsulDoctor', 'consul_doctor');
        $this->load->model('Doctors', 'doctors');

        if (empty($user)) {
            redirect('masuk-akun');
        }
        if ($user['level_user'] == 'admin') {
            redirect('dasbor');
        }
    }

    public function index() {
        $page_title = "Konsul Dokter";
        $doctors = $this->doctors->get_doctors();
        $data = array(
            'page_title' => $page_title,
            'doctors' => $doctors,
            '_content' => 'front_end/consul_doctor/consul_doctor',
            '_css' => 'assets/css/front_end/consul_doctor/consul_doctor.css',
            '_js' => 'assets/js/front_end/consul_doctor/consul_doctor.js'
        );
        $this->load->view('front_end/base', $data);
    }

    public function do_consul() {
        $result = $this->consul_doctor->post();
        if ($result['status']) {
            $this->session->set_flashdata('success', $result['message']);
            return redirect('konsul-dokter');
        } else {
            $this->session->set_flashdata('error', $result['message']);
            return redirect('konsul-dokter');
        }
    }

}
