<?php


class Caspio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		//$this->load->model('login_model');
		$this->load->model('setting_model');

	}

	public function index()
	{
		$data['settings'] = $this->setting_model->get_setting();
		$this->load->view('caspio_pull', $data);
		

	}
	
   

}
?>