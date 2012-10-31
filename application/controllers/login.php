<?php

class Login extends CI_Controller {

	function index()
	{
		
		$data['main_content'] = 'login';
		
		$this->load->view('includes/template', $data);
	}
	
	function validate()
	{
		
		$this->config->load('login');
		
		if(strcmp($this->config->item('username'), $this->input->post('username'))==NULL &&
			strcmp($this->config->item('password'), $this->input->post('password'))==NULL)
			{
				$this->session->set_userdata('admin', TRUE);
				redirect('contact/view_feedbacks');
			}
			else
			{
				$this->index();
			}
	}
	
	function logout()
	{
		
		$this->session->unset_userdata('admin');
		$this->session->sess_destroy();
		redirect('site/index');
	}
	
	function is_logged()
	{
		if(!$this->session->userdata('admin'))
		{
			redirect('site/index');
		}
	}

}