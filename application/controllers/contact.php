<?php

class Contact extends CI_Controller {

	function index($msg=null)
	{
	
		$data['main_content'] = 'contact';
		$data['msg'] = $msg;
		
		$this->load->view('includes/template', $data);
	}
	
	function validate()
	{
		
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'message' => $this->input->post('message')
		);
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[1]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$this->index($msg);
		}
		else
		{
			$this->load->model('contact_model');
			$this->contact_model->new_feedback($data);
			$msg = "Feedback was sent successfuly!";
			$this->index($msg);
		}
	}
	
	function view_feedbacks()
	{
		if(!$this->session->userdata('admin'))
		{
			redirect('site/index');
		}
		
		$this->load->library('pagination');
		$this->load->model('contact_model');

		$config['base_url'] = 'http://localhost/coffe_restaurant/index.php/contact/view_feedbacks/';
		$config['total_rows'] = $this->contact_model->num_feedbacks();
		$config['per_page'] = 5;
		$config['num_links'] = 10;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config); 

		$data['links'] = $this->pagination->create_links();
		
		$data['feedbacks'] = $this->contact_model->view_feedbacks($config['per_page'], $this->uri->segment(3));
		
		$data['main_content'] = 'view_feedbacks';
		$this->load->view('includes/template', $data);
	}
	
	function delete_feedback($id)
	{
		if(!$this->session->userdata('admin'))
		{
			redirect('site/index');
		}
		
		$this->load->model('contact_model');
		$this->contact_model->delete_feedback($id);
		
		$this->view_feedbacks();
	}

}