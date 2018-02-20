
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model
{
	public function save()
	{
		$data = array(
			"username" => $this->input->post('username'),
			"name" => $this->input->post('name'),
			"email" => $this->input->post('email'),
			"born_date" => $this->input->post('born_date'),
			"gender" => $this->input->post('gender'),
			"password" => $this->input->post('password'),
			"user_level" => $this->input->post('user_level')
		);
		var_dump($data);
		$this->db->insert('users', $data);
	}
}