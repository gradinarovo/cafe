<?php

class Gallery extends CI_Controller {

	function index($data=null)
	{
		$this->load->model('gallery_model');
		$data['images'] = $this->gallery_model->get_images();
		
		$data['main_content'] = 'gallery';
		
		$this->load->view('includes/template', $data);
	}
	
	function upload()
	{
		$data = null;
		
		$config = array(
			'upload_path' => './uploads/',
			'allowed_types' => 'gif|jpg|png',
			'overwrite' => TRUE
		);
		
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		
		
		
		if(!$this->upload->do_upload())
		{
			$data['errors_upload'] = $this->upload->display_errors();
			$data['upload_path'] = $config['upload_path'];
			
			$this->index($data);
		}
		else
		{
			$upload_data = $this->upload->data();
			
			$this->load->model('gallery_model');
			$this->gallery_model->insert_image($upload_data);
			
			$config = array(
				'source_image' => $upload_data['full_path'],
				'new_image' => './uploads/thumbs/',
				'maintain_ratio' => TRUE,
				'width' => 200,
				'height' => 100
			);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			
			if(!$this->image_lib->resize())
			{
				$data['errors_thumb'] = $this->image_lib->display_errors();
			}
			
			$this->index($data);
		}
	}
	
	function delete($image_name)
	{
		$this->load->model('gallery_model');
		$this->gallery_model->delete_image($image_name);
		
		$this->load->helper('file');
		delete_files('./uploads/thumbs/'.$image_name);
		delete_files('./uploads/'.$image_name);
		
		$this->index();
	}

}