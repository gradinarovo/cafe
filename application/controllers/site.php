<?php

class Site extends CI_Controller {

	function index()
	{
		$this->load->library('googlemaps');
		
		$config['center'] = 'bulevard Knyaginya Mariya Luiza, Sofia';
		$config['zoom'] = 'auto';
		$config['map_type'] = 'ROADMAP';
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = 'bulevard Knyaginya Mariya Luiza, Sofia';
		$marker['title'] = 'My coffe shop';
		$this->googlemaps->add_marker($marker);
		
		$data['map'] = $this->googlemaps->create_map();
		
		$data['main_content'] = 'home';
		
		$this->load->view('includes/template', $data);
	}

}