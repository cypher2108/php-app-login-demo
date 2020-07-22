<?php

class Auth extends CI_Controller
{
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if ($this->form_validation->run() == TRUE) {
			//check user in database

			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$this->db->select('*');
			$this->db->from('users');
			$this->db->where(array('username' => $username, 'password' => $password));
			$query = $this->db->get();

			$user = $query->row();
			//if user exists
			if ($user->email) {
				$this->session->set_flashdata("success", "login successful");
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['username'] = $user->username;
				//redirect to profile page
				redirect("book/index", "refresh");
			} else {
				$this->session->set_flashdata("error", "Invalid credentials or no user found");
				redirect("auth/login", "refresh");
			}
		}

		$this->load->view('login');
	}

	public function register()
	{
		if (isset($_POST['register'])) {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'Email ', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('password', 'Confirm Password', 'required|min_length[5]|matches[password]');
			$this->form_validation->set_rules('phone', 'Phone ', 'required');
			//if form validation true
			if ($this->form_validation->run() == TRUE) {
				echo 'form validated';
				$data = array(
					'username' => $_POST['username'],
					'email' => $_POST['email'],
					'password' => md5($_POST['password']),
					'gender' => $_POST['gender'],
					'created_at' => date('y-m-d'),
					'phone' => $_POST['phone']
				);
				$this->db->insert('users', $data);
				$this->session->set_flashdata("success", "Login Registered Successfully!");
				redirect("auth/register", "Refresh");


			}
		}
		$this->load->view('register');
	}

	public function logout(){
		unset($_SESSION);
		session_destroy();
		redirect("auth/login", "refresh");

	}

}
