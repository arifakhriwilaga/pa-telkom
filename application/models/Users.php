
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model
{
	public function login()
	{
		$result = array();
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->where('username',$username);
		$username = $this->db->get('users');
		if ($username->num_rows() == 0) {
			$result = array(
				'status' => false,
				'message' => 'Username does not exist!',
				'data' => null
			);
			return $result;
		}

		$this->db->where('password',md5($password));
		$query = $this->db->get('users');
		if ($query->num_rows() == 0) {
			$result = array(
				'status' => false,
				'message' => 'Password incorrect',
				'data' => null
			);
			return $result;
		}

		$result = array(
			'status' => true,
			'message' => 'Login berhasil!',
			'data' => $query->result()
		);
		return $result;
	}
	public function save()
	{
		$result = array();
		$data = array(
			"username" => $this->input->post('username'),
			"name" => $this->input->post('name'),
			"email" => $this->input->post('email'),
			"born_date" => $this->input->post('born_date'),
			"gender" => $this->input->post('gender'),
			"password" => md5($this->input->post('password')),
			"user_level" => $this->input->post('user_level')
		);
		if ($this->db->insert('users', $data)) {
			$result = array(
				'status' => true,
				'message' => 'Data berhasil disimpan!',
				'data' => null
			);
			return $result;
		} else {
			$error = $this->db->error();
			$result = array(
				'status' => false,
				'message' => $error['message'],
				'data' => null
			);
			return $result;
		}
	}
}