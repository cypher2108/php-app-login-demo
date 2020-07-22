<?php

class Book_model extends CI_Model
{
	function add($formArray){
		$this->db->insert('books', $formArray);
	}

	function all(){
		return $books = $this->db->get('books')->result_array();
	}

	function get_book($bookId){
		$this->db->where('book_id', $bookId);
		return $book = $this->db->get('books')->row_array();
	}

	function updateBook($bookId, $formArray){
		$this->db->where('book_id', $bookId);
		$this->db->update('books', $formArray);
	}

	function deleteBook($bookId){
		$this->db->where('book_id', $bookId);
		$this->db->delete('books');
	}
}
?>
