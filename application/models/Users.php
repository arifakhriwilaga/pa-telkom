
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model
{
	
	public function validation($mode)
	{
		$this->load->library('form_validation');

		if($mode == "save")
			$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|max_length[30]');
			$this->form_validation->set_rules('name', 'Nama', 'required|max_length[50]');
			$this->form_validation->set_rules('email', 'Alamat Email', 'required|max_length[50]');
			$this->form_validation->set_rules('born_date', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('password', 'Kata Sandi', 'required');

		if($this->form_validation->run())
			return TRUE;
		else
			return FALSE; 
	}

	public function save()
	{
		$data = array(
			"username" => $this->input->post('username'),
			"name" => $this->input->post('name'),
			"email" => $this->input->post('email'),
			"born_date" => $this->input->post('born_date'),
			"gender" => $this->input->post('gender'),
			"password" => $this->input->post('password')
		);

		$this->db->insert('user', $data);
	}
}