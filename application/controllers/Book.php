<?php

class Book extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($_SESSION['user_logged'] == FALSE) {
			$this->session->set_flashdata("error", "Please login to access this page");
			redirect("auth/login", "refresh");
		}
	}


	function index(){
		$this->load->model('Book_model');
		$books = $this->Book_model->all();
		$data = array();
		$data['books'] = $books;
		$this->load->view('list', $data);
	}

	function add()
	{
		$this->load->model('Book_model');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('isbn_number', 'ISBN_Number', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('add');
		} else {
			//save data to database
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['author'] = $this->input->post('author');
			$formArray['isbn_number'] = $this->input->post('isbn_number');
			$formArray['created_at'] = date('y,m,d');

			$this->Book_model->add($formArray);
			$this->session->set_flashdata('success', 'Record Added Successfully!');
			redirect(base_url().'index.php/Book/index');

		}
	}

	function edit($bookId){
		$this->load->model('Book_model');
		$book = $this->Book_model->get_book($bookId);
		$data = array();
		$data['book'] = $book;

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('isbn_number', 'ISBN_Number', 'required');

		if ($this->form_validation->run() == false){
			$this->load->view('edit', $data);
		} else {
			//update user record
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['isbn_number'] = $this->input->post('isbn_number');
			$this->Book_model->updateBook($bookId, $formArray);
			$this->session->set_flashdata('success', 'Record updated successfully!');
			redirect(base_url().'index.php/Book/index');
		}

	}

	function delete($bookId){
		$this->load->model('Book_model');
		$book = $this->Book_model->get_book($bookId);
		if (empty($book)) {
			$this->session->set_flashdata('failure', 'Record not found!');
			redirect(base_url().'index.php/Book/index');
		} else {
			$this->Book_model->deleteBook($bookId);
			$this->session->set_flashdata('success', 'Record deleted successfully!');
			redirect(base_url().'index.php/Book/index');
		}
	}
}

?>
