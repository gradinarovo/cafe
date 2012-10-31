<?php
class Gallery_model extends CI_Model {

	function get_images()
	{
		$query = $this->db->get('images');
		
		return $query->result();
	}
	
	function insert_image($data)
	{
		$info = array(
			'image_name' => $data['file_name'],
			'file_path' => $data['file_path'],
			'image_width' => $data['image_width'],
			'image_height' => $data['image_height']
		);
		
		$this->db->insert('images', $info);
	}

	function delete_image($image_name)
	{
		$this->db->where('image_name', $image_name);
		$this->db->delete('images');
	}
}