<?php

class Pages extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('pages_model');
		$this->load->model('login_model');
		$this->load->model('setting_model');
	}


	public function view($page = 'home') {
		
		
		$data['show_my_account'] = 1;
		
		$data['settings'] = $this->setting_model->get_setting();
		
		
		if ( ! file_exists('dn_application/views/'.$page.'.php')) {
			// Whoops, we don't have a page for that!
			//show_404();
		} else {
			
			$data['bad_login'] = 0;
			
			$this->load->view('templates/heading', $data);
			//$this->load->view('templates/header', $data);
			$this->load->view($page, $data);
			$this->load->view('templates/footer', $data);			
			
			
		
		}
		

	}
/*

*/	
}

?>