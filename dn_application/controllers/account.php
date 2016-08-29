<?php

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('My_PHPMailer');
		$this->load->model('account_model');
		$this->load->model('setting_model');
		$this->load->model('user_model');		
		$this->load->model('email_model');
		$this->load->model('pagenate_model');
		$this->load->model('inventory_model');
		$this->load->model('bank_model');
		
		if (!$this->session->userdata('user_id') || $this->session->userdata('user_level') != 'dealer') {
			
			header("Location: " . base_url());	
			
		}

		
	}

	public function index()
	{
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['did'] = $this->session->userdata('dealer_id');
		
		//$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/dashboard_dealer', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);
		
	}

	public function dashboard_dealer()
	{
		
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['did'] = $this->session->userdata('dealer_id');
		
		//$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/dashboard_dealer', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);
			
		
	}
	
	public function inventory_list($page = 0)
	{
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['did'] = $this->session->userdata('dealer_id');
		
		
		
		// Add new inventory
		$data['suc_mes'] = '';
		if ($this->input->post('act') == 'add') {
			$this->inventory_model->do_inventory($this->input->post('inventory_first_name'),
													$this->input->post('inventory_last_name'), 
													$this->input->post('inventory_email'), 
													$this->input->post('inventory_password'), 
													'administrator'
													);
			
			$data['suc_mes'] = 'New Inventory Item Added';
			
			
			
		} elseif ($this->input->post('act') == 'edit') {
		// edit inventory	
			$this->inventory_model->set_inventory( $this->input->post('uid'), $this->input->post('inventory_first_name'), $this->input->post('inventory_last_name'), $this->input->post('inventory_email'), $this->input->post('inventory_password'));
			$data['suc_mes'] = 'Inventory Item Edited';
			
			
		} else {
			
		}			
			
		// get all inventory
		
///////// pagenation ///////////
////// get all inventory ////////

$tbl_name = 'inventory';

$limit = $this->pagenate_model->get_limit();
	
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;	

$targetpage = "index.php?/account/inventory_list/"; 
		


	$total_pages = count($this->inventory_model->get_inventory($data['did'],'','',100000000,0));	

	$data['inventory_list'] = $this->inventory_model->get_inventory($data['did'],$limit,$start);			



$data['pagination'] = $this->pagenate_model->pagenate_me($tbl_name,$total_pages,$limit,$page,$targetpage,$start);


////// end get all inventorys ////////
///////// end pagenation ///////////




		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/inventory_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);
		
	}
	
	public function inventory_add($did)
	{
		$data['settings'] = $this->setting_model->get_setting();
		$data['did'] = $did;

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/inventory_add', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);
		
	}
	
	public function inventory_edit($iid)
	{	
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['inventory'] = $this->inventory_model->get_one_inventory($iid);

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/inventory_edit', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);
		
	}
	
	public function inventory_del($iid)
	{
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$this->inventory_model->delete_inventory($iid);
		
		$data['limit'] = $this->pagenate_model->get_limit();
		$data['offset'] = $this->pagenate_model->get_offset();		
		
		$data['inventory'] = $this->inventory_model->get_inventory(0,'',$data['limit'],$data['offset']);		
		
		$data['suc_mes'] = 'Inventory Item Deleted';

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/inventory_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);
		
	}
////////////////////////////////////////////////////////
// CALCULATORS
////////////////////////////////////////////////////////
	public function cal_have_pay_stub() {
		$data['settings'] = $this->setting_model->get_setting();
		
		//$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);
		
		$data['did'] = $this->session->userdata('dealer_id');

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/cal_have_pay_stub', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);	
		

	}
	public function cal_hourly() {
		$data['settings'] = $this->setting_model->get_setting();
		
		//$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);
		
		$data['did'] = $this->session->userdata('dealer_id');
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/cal_hourly', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);	
		

	}
		public function cal_salary() {
		$data['settings'] = $this->setting_model->get_setting();
		
		//$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);
		
		$data['did'] = $this->session->userdata('dealer_id');
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/cal_salary', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);	
		

	}

	public function cal_back_into_sale() {
		$data['settings'] = $this->setting_model->get_setting();
		
		//$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);
		
		$data['did'] = $this->session->userdata('dealer_id');
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/cal_back_into_sale', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);	
		

	}
	
	
////////////////////////////////////////////////////////
// BANKS
////////////////////////////////////////////////////////

	public function banks_manage()
	{
		
		
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);
		
		$data['did'] = $this->session->userdata('dealer_id');
		
		
		// Add new user
		$data['suc_mes'] = '';
		
		$this->bank_model->del_bank_assignment($this->input->post('did'));

		if ($this->input->post('act') == 'bank_assignment') {
			
			if (isset($_POST['cb_bank'])) {
				foreach ($_POST['cb_bank'] as $val) {
					$this->bank_model->do_bank_assignment($data['did'],$val);
					
				}		
			}
			
			$data['suc_mes'] = 'Banks Assignment Changed';
			
		}




		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('account/banks_manage', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('account/leftmenu', $data);	
		
	}
	

}