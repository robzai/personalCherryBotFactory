<?php
class DBTools extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	function insert_parts($data){
		// Inserting in Table(parts) of Database()
		$this->db->insert('parts', $data);
	}
}
?>