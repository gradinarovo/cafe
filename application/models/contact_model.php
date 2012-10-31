<?php
class Contact_model extends CI_Model {
	
	function new_feedback($data)
	{
		$this->db->insert('contact', $data);
	}
	
	function view_feedbacks($limit, $offset)
	{
		$query = $this->db->get('contact', $limit, $offset);
		return $query->result();
	}
	
	function delete_feedback($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('contact');
	}
	
	function num_feedbacks()
	{
		return $this->db->get('contact')->num_rows();
	}
}