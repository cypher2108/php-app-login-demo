<?php

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($_SESSION['user_logged'] == FALSE) {
			$this->session->set_flashdata("error", "Please login to access this page");
			redirect("auth/login", "refresh");
		}
	}

	public function profile()
	{
		$this->load->view('profile');
	}
}

?>
