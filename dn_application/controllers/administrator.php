<?php

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('My_PHPMailer');
		$this->load->model('administrator_model');
		$this->load->model('setting_model');
		$this->load->model('user_model');
		$this->load->model('dealer_model');
		$this->load->model('bank_model');		
		$this->load->model('email_model');
		$this->load->model('pagenate_model');
		$this->load->model('bank_model');
		$this->load->model('inventory_model');
		
		if (!$this->session->userdata('user_id') || $this->session->userdata('user_level') != 'administrator') {
			header("Location: " . base_url());	
		}

	}

	public function index()
	{
		
		$data['settings'] = $this->setting_model->get_setting();

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/dashboard', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}

	public function dashboard()
	{
		
		
		$data['settings'] = $this->setting_model->get_setting();
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/dashboard', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}

	public function csv($which)
	{
			
		// Add new user
		$data['suc_mes'] = '';
		$data['err_mes'] = '';
		$data['data_file'] = '';
		$data['did'] = $this->input->post('did');
		$data['tab'] = $which;
	
		if ($which == 'import') {
			if ($this->input->post('act') == 'add_import') {

				$ul_err_mes = '';
				$ul_suc_mes = '';
			
				$datim = time();
				
				$target_dir = "data_import/" . $datim . "/";
				
				if (!file_exists($target_dir)) {
					mkdir($target_dir, 0755, true);
				}
				
				$target_file = $target_dir . basename($_FILES["csv_uploader"]["name"]);
				$uploadOk = 1;
				$file_name = $datim . $_FILES["csv_uploader"]["name"];					
				
				$fileType = pathinfo($target_file,PATHINFO_EXTENSION);			
	
				// Allow certain file formats
				if($fileType != "csv") {
					$ul_err_mes .= "Sorry, only csv files are allowed.";
					$uploadOk = 0;
				}		
				
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$ul_err_mes .= "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["csv_uploader"]["tmp_name"], $target_file)) {
						$ul_suc_mes .= "The file <strong>". basename( $_FILES["csv_uploader"]["name"]). "</strong> has been uploaded.";
						
						$data['data_file'] = $target_file;
						
					} else {
						$ul_err_mes .= "Sorry, there was an error uploading your file.";
					}
				}
	
				
				if ($ul_err_mes == '') {
					$data['suc_mes'] = $ul_suc_mes;
				} else {
					$data['err_mes'] = $ul_err_mes;
				} 
				
			}
		} // end if import

		if ($which == 'export') {
			if ($this->input->post('act') == 'do_export') {
				
			}
			
		}
/**/		

		$data['settings'] = $this->setting_model->get_setting();
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/inventory_add', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function users_list()
	{
		$data['settings'] = $this->setting_model->get_setting();
		
		
		// Add new user
		$data['suc_mes'] = '';
		if ($this->input->post('act') == 'add') {
			$this->user_model->do_user($this->input->post('user_first_name'), $this->input->post('user_last_name'), $this->input->post('user_email'), $this->input->post('any_password'), 1);
			$data['suc_mes'] = 'New Administrator User Added with password:' . $this->input->post('any_password');
			
			
			
		} elseif ($this->input->post('act') == 'edit') {
		// edit user	
			$this->user_model->set_user( $this->input->post('uid'), $this->input->post('user_first_name'), $this->input->post('user_last_name'), $this->input->post('user_email'), $this->input->post('user_password'));
			$data['suc_mes'] = 'Administrator User Edited';
			
			
		} else {
			
		}			
			
		// get all users
		
		$data['limit'] = $this->pagenate_model->get_limit();
		$data['offset'] = $this->pagenate_model->get_offset();		
		

		if ($this->input->post('act') == 'search') {
			
			$data['rec_count'] = count($this->user_model->get_user(0,$this->input->post('search_keyword'),0,0, 1));		
		
			$data['user'] = $this->user_model->get_user(0,$this->input->post('search_keyword'),$data['limit'],$data['offset'], 1);			

		} else {
			
			$data['rec_count'] = count($this->user_model->get_user(0,'',0,0, 1));		
		
			$data['user'] = $this->user_model->get_user(0,'',$data['limit'],$data['offset'], 1);			
			
		}




		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/users_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function users_add()
	{
		$data['settings'] = $this->setting_model->get_setting();
		

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/users_add', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function users_edit($uid)
	{	
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['limit'] = $this->pagenate_model->get_limit();
		$data['offset'] = $this->pagenate_model->get_offset();		
		
		$data['user'] = $this->user_model->get_user($uid,'',$data['limit'],$data['offset'], 1);

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/users_edit', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function users_del($uid)
	{
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$this->user_model->delete_user($uid);
		
		$data['limit'] = $this->pagenate_model->get_limit();
		$data['offset'] = $this->pagenate_model->get_offset();		
		
		$data['user'] = $this->user_model->get_user(0,'',$data['limit'],$data['offset'], 1);
		
		$data['suc_mes'] = 'Administrator User Deleted';

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/users_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}

	public function settings()
	{
		$data['suc_mes'] = '';
		if ($this->input->post('act') == 'edit') {
					
			$this->setting_model->set_setting($this->input->post('setting_company_name'),
																 $this->input->post('setting_url'),
																 $this->input->post('setting_email_support'),
																 $this->input->post('setting_phone_support'),
																 $this->input->post('setting_email_admin'),
																 $this->input->post('setting_email_test'),
																 $this->input->post('setting_email_template_top'),
																 $this->input->post('setting_email_template_bottom'),
																 $this->input->post('setting_email_welcome_subject'),
																 $this->input->post('setting_email_welcome_body'),
																 $this->input->post('setting_email_password_reset_subject'),
																 $this->input->post('setting_email_password_reset_body'));
		
			$data['suc_mes'] = 'Settings Edited';
			
			
		}



		$data['settings'] = $this->setting_model->get_setting();
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/settings', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}

    public function email_compose()
	{

		$data['suc_mes'] = '';
		
		//echo $data['emid'] . '---<br>';
		
		if (isset($_POST['cb_email'])) {
			
			$data['emid'] = $this->administrator_model->do_email('temp');
			
			foreach ($_POST['cb_email'] as $val) {
				
				$query = $this->db->get_where('user', array('user_id' => $val));
				$email_address = $query->row_array();
				
				$this->administrator_model->do_email_list($data['emid'],$val,$email_address['user_email']);
				
			}			
		}

		/**/	

	
		
		
		$data['settings'] = $this->setting_model->get_setting();
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/email_compose', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);			
	}	
	
	
	public function dealers_list($page = 0)
	{
		
		
		$data['settings'] = $this->setting_model->get_setting();
		
		
		// Add new user
		$data['suc_mes'] = '';
		if ($this->input->post('act') == 'add') {
			
			
			$uid = $this->user_model->do_user($this->input->post('dealer_first_name'),
														  $this->input->post('dealer_last_name'),
														  $this->input->post('user_email'),
														  $this->input->post('any_password'),
														  2
														  );
			
			$did = $this->dealer_model->do_dealer($uid,
											$this->input->post('dealer_first_name'), 
											$this->input->post('dealer_last_name'), 
											$this->input->post('dealer_company'), 
											$this->input->post('dealer_address1'),
											$this->input->post('dealer_address2'),
											$this->input->post('dealer_city'),
											$this->input->post('dealer_state'),
											$this->input->post('dealer_zip'),
											$this->input->post('dealer_phone'),
											$this->input->post('user_email'),
											$this->input->post('dealer_status'),
											$this->input->post('dealer_level'),
											$this->input->post('dealer_tax_rate'),
											$this->input->post('dealer_title_fee'),
											$this->input->post('dealer_doc_fee')											
											);
			
			
			if (isset($_POST['cb_bank'])) {
				foreach ($_POST['cb_bank'] as $val) {
	
					$this->bank_model->do_bank_assignment($did,$val);
					
				}		
			}

			

			$data['suc_mes'] = 'New Dealer Added';

			
		} elseif ($this->input->post('act') == 'edit') {
		// edit dealer	
			$this->dealer_model->set_dealer( $this->input->post('did'),
											$this->input->post('dealer_first_name'), 
											$this->input->post('dealer_last_name'), 
											$this->input->post('dealer_company'), 
											$this->input->post('dealer_address1'),
											$this->input->post('dealer_address2'),
											$this->input->post('dealer_city'),
											$this->input->post('dealer_state'),
											$this->input->post('dealer_zip'),
											$this->input->post('dealer_phone'),
											$this->input->post('user_email'),
											$this->input->post('dealer_status'),
											$this->input->post('dealer_level'),
											$this->input->post('dealer_tax_rate'),
											$this->input->post('dealer_title_fee'),
											$this->input->post('dealer_doc_fee')
											);
			
			$uid = $this->user_model->set_user($this->input->post('uid'),
											   $this->input->post('dealer_first_name'),
														  $this->input->post('dealer_last_name'),
														  $this->input->post('user_email'),
														  ''
														  );			
			
			$data['suc_mes'] = 'Dealer Edited';
			
			
		} elseif ($this->input->post('act') == 'bank_assignment') {
			
			$this->bank_model->del_bank_assignment($this->input->post('did'));

			foreach ($_POST['cb_bank'] as $val) {

				$this->bank_model->do_bank_assignment($this->input->post('did'),$val);
				
			}			

			$data['suc_mes'] = 'Bank Assignment Updated';

		} else {
			
		}			
	

///////// pagenation ///////////
////// get all dealers ////////

$tbl_name = 'dealer';

$limit = $this->pagenate_model->get_limit();
	
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;	

$targetpage = "index.php?/administrator/dealers_list/"; 
		
if ($this->input->post('act') == 'search') {
	
	$total_pages = count($this->dealer_model->get_dealer(0,$this->input->post('search_keyword'),'search',100000000,0));

	$data['dealer_list'] = $this->dealer_model->get_dealer(0,$this->input->post('search_keyword'),'search',$limit,$start);				

} elseif ($this->input->post('act') == 'sort') {
	
	$total_pages = count($this->dealer_model->get_dealer(0,$this->input->post('sort_keyword'),'sort',100000000,0));
	
	$data['dealer_list'] = $this->dealer_model->get_dealer(0,$this->input->post('sort_keyword'),'sort',$limit,$start);
	
} else {

	$total_pages = count($this->dealer_model->get_dealer(0,'','',100000000,0));	

	$data['dealer_list'] = $this->dealer_model->get_dealer(0,'','',$limit,$start);			

}


$data['pagination'] = $this->pagenate_model->pagenate_me($tbl_name,$total_pages,$limit,$page,$targetpage,$start);


////// end get all dealers ////////
///////// end pagenation ///////////



		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/dealers_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function dealers_add()
	{
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/dealers_add', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function dealers_edit($did)
	{	
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['dealer'] = $this->dealer_model->get_dealer($did,'');

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/dealers_edit', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function dealers_banks($did)
	{	
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['dealer'] = $this->dealer_model->get_dealer($did,'');
		
		$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/dealers_banks', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function dealers_del($did)
	{
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['dealer'] = $this->dealer_model->get_dealer($did,'');
		
		$uid = $data['dealer']['user_id'];
		
		$this->dealer_model->delete_dealer($did,$uid);		

///////// pagenation ///////////
////// get all dealers ////////

$page = 0;

$tbl_name = 'dealer';

$limit = $this->pagenate_model->get_limit();
	
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;	

$targetpage = "index.php?/administrator/dealers_list/"; 
		
if ($this->input->post('act') == 'search') {
	
	$total_pages = count($this->dealer_model->get_dealer(0,$this->input->post('search_keyword'),'search',100000000,0));

	$data['dealer_list'] = $this->dealer_model->get_dealer(0,$this->input->post('search_keyword'),'search',$limit,$start);				

} elseif ($this->input->post('act') == 'sort') {
	
	$total_pages = count($this->dealer_model->get_dealer(0,$this->input->post('sort_keyword'),'sort',100000000,0));
	
	$data['dealer_list'] = $this->dealer_model->get_dealer(0,$this->input->post('sort_keyword'),'sort',$limit,$start);
	
} else {

	$total_pages = count($this->dealer_model->get_dealer(0,'','',100000000,0));	

	$data['dealer_list'] = $this->dealer_model->get_dealer(0,'','',$limit,$start);			

}


$data['pagination'] = $this->pagenate_model->pagenate_me($tbl_name,$total_pages,$limit,$page,$targetpage,$start);


////// end get all dealers ////////
///////// end pagenation ///////////
		
		$data['suc_mes'] = 'Dealer Deleted';

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/dealers_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}



////////////////////////////////////////////////////////
// BANKS
////////////////////////////////////////////////////////

	public function banks_list($page = 0)
	{
		
		
		$data['settings'] = $this->setting_model->get_setting();
		
		
		// Add new user
		$data['suc_mes'] = '';
			
	

///////// pagenation ///////////
////// get all banks ////////



$tbl_name = 'bank';

$limit = $this->pagenate_model->get_limit();
	
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;	

$targetpage = "index.php?/administrator/banks_list/"; 
		
if ($this->input->post('act') == 'search') {
	
	$total_pages = count($this->bank_model->get_bank(0,$this->input->post('search_keyword'),'search',100000000,0));

	$data['bank_list'] = $this->bank_model->get_bank(0,$this->input->post('search_keyword'),'search',$limit,$start);				

} elseif ($this->input->post('act') == 'sort') {
	
	$total_pages = count($this->bank_model->get_bank(0,$this->input->post('sort_keyword'),'sort',100000000,0));
	
	$data['bank_list'] = $this->bank_model->get_bank(0,$this->input->post('sort_keyword'),'sort',$limit,$start);
	
} else {

	$total_pages = count($this->bank_model->get_bank(0,'','',100000000,0));	

	$data['bank_list'] = $this->bank_model->get_bank(0,'','',$limit,$start);			

}


$data['pagination'] = $this->pagenate_model->pagenate_me($tbl_name,$total_pages,$limit,$page,$targetpage,$start);


////// end get all banks ////////
///////// end pagenation ///////////

		if ($this->input->post('act') == 'add') {

			
			$bid = $this->bank_model->do_bank(
											$this->input->post('bank_name'),
											$this->input->post('bank_address1'),
											$this->input->post('bank_address2'),
											$this->input->post('bank_city'),
											$this->input->post('bank_state'),
											$this->input->post('bank_zip'),
											$this->input->post('bank_phone'),
											$this->input->post('bank_email'),
											$this->input->post('bank_url')
											);
					
			$this->bank_model->do_bank_metrics($bid);											   

			$data['suc_mes'] = 'New Bank Added';
			$data['suc_mes1'] = '';
			$data['suc_mes2'] = '';
			$data['suc_mes3'] = '';
			
			$data['bank'] = $this->bank_model->get_bank($bid,'');
			
			$data['bank_metrics'] = $this->bank_model->get_bank_metrics($bid);
		
			$data['bank_years']['count'] = count($this->bank_model->get_bank_years_tiers($bid));
			$data['bank_years'] = $this->bank_model->get_bank_years_tiers($bid);
					
			$data['bank_scores']['count'] = count($this->bank_model->get_bank_scores_tiers($bid));
			$data['bank_scores'] = $this->bank_model->get_bank_scores_tiers($bid);


			$this->load->view('templates/admin/heading', $data);
			$this->load->view('templates/admin/header', $data);
			$this->load->view('administrator/banks_rates', $data);
			$this->load->view('templates/admin/footer', $data);			
			$this->load->view('administrator/leftmenu', $data);			

			
		} elseif ($this->input->post('act') == 'edit') {
		// edit bank	
			$this->bank_model->set_bank($this->input->post('bid'),
											$this->input->post('bank_name'),
											$this->input->post('bank_address1'),
											$this->input->post('bank_address2'),
											$this->input->post('bank_city'),
											$this->input->post('bank_state'),
											$this->input->post('bank_zip'),
											$this->input->post('bank_phone'),
											$this->input->post('bank_email'),
											$this->input->post('bank_url')
											);
			
			$data['suc_mes'] = 'Bank Edited';

			$this->load->view('templates/admin/heading', $data);
			$this->load->view('templates/admin/header', $data);
			$this->load->view('administrator/banks_list', $data);
			$this->load->view('templates/admin/footer', $data);			
			$this->load->view('administrator/leftmenu', $data);			

			
		} else {
			$this->load->view('templates/admin/heading', $data);
			$this->load->view('templates/admin/header', $data);
			$this->load->view('administrator/banks_list', $data);
			$this->load->view('templates/admin/footer', $data);			
			$this->load->view('administrator/leftmenu', $data);			
		}


		
	}
	
	public function banks_add()
	{
		$data['settings'] = $this->setting_model->get_setting();

		// Get all banks //
		$data['bank_list'] = $this->bank_model->get_bank(0,'','',100000000,0);				


		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/banks_add', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function banks_edit($bid)
	{	
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['bank'] = $this->bank_model->get_bank($bid,'');

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/banks_edit', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function banks_del($did)
	{
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$this->bank_model->delete_bank($did);		

///////// pagenation ///////////
////// get all banks ////////

// add this var to delete functions //
$page = 0;

$tbl_name = 'bank';

$limit = $this->pagenate_model->get_limit();
	
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;	

$targetpage = "index.php?/administrator/banks_list/"; 
		
if ($this->input->post('act') == 'search') {
	
	$total_pages = count($this->bank_model->get_bank(0,$this->input->post('search_keyword'),'search',100000000,0));

	$data['bank_list'] = $this->bank_model->get_bank(0,$this->input->post('search_keyword'),'search',$limit,$start);				

} elseif ($this->input->post('act') == 'sort') {
	
	$total_pages = count($this->bank_model->get_bank(0,$this->input->post('sort_keyword'),'sort',100000000,0));
	
	$data['bank_list'] = $this->bank_model->get_bank(0,$this->input->post('sort_keyword'),'sort',$limit,$start);
	
} else {

	$total_pages = count($this->bank_model->get_bank(0,'','',100000000,0));	

	$data['bank_list'] = $this->bank_model->get_bank(0,'','',$limit,$start);			

}


$data['pagination'] = $this->pagenate_model->pagenate_me($tbl_name,$total_pages,$limit,$page,$targetpage,$start);


////// end get all banks ////////
///////// end pagenation ///////////
		
		$data['suc_mes'] = 'Bank Deleted';

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/banks_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	
	public function banks_metrics($bid)
	{
		$data['suc_mes'] = '';
		$data['suc_mes1'] = '';
		$data['suc_mes2'] = '';
	
		if ($this->input->post('act') == 'edit_metrics') {
			
						
				$this->bank_model->set_bank_metrics(
												$bid,
												$this->input->post('bank_metric_fe_advance'),
												$this->input->post('bank_metric_be_advance'),
												$this->input->post('bank_metric_max_term')
												);											   
	
				$data['suc_mes1'] = 'Bank Metrics Edited';		
			
		}
	
		if ($this->input->post('act') == 'edit_scores') {
			
			$num_tiers = $this->input->post('bank_score_tiers');
			
			// first delete all current levels //
			$this->bank_model->del_bank_scores_tiers($bid);
			
			// then add new tiers one by one //
			for ($i=1;$i<=$num_tiers;$i++) {
				
				$this->bank_model->do_bank_scores_tiers($bid,
														 $this->input->post('bank_score_start_' . $i),
														 $this->input->post('bank_score_end_' . $i)
														 );
				
			}
										   
	
				$data['suc_mes2'] = 'Bank Scores Range Edited';		
			
		}	
	
		if ($this->input->post('act') == 'edit_years') {
			
			$num_tiers = $this->input->post('bank_year_tiers');
			
			// first delete all current levels //
			$this->bank_model->del_bank_years_tiers($bid);
			
			// then add new tiers one by one //
			for ($i=1;$i<=$num_tiers;$i++) {
				
				$this->bank_model->do_bank_years_tiers($bid,
														 $this->input->post('bank_year_start_' . $i),
														 $this->input->post('bank_year_end_' . $i)
														 );
				
			}
										   
	
				$data['suc_mes3'] = 'Bank Years Range Edited';		
			
		}	
	
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['bank'] = $this->bank_model->get_bank($bid,'');
		
		$bank_tag = $data['bank']['bank_tag'];
		
		$data['bank_metrics'] = $this->bank_model->get_bank_metrics($bid);
		
		$data['bank_years']['count'] = count($this->bank_model->get_bank_years_tiers($bid));
		$data['bank_years'] = $this->bank_model->get_bank_years_tiers($bid);
		
		$data['bank_scores']['count'] = count($this->bank_model->get_bank_scores_tiers($bid));
		$data['bank_scores'] = $this->bank_model->get_bank_scores_tiers($bid);

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/banks_metrics_' . $bank_tag, $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}	
	

	public function banks_rates($bid)
	{
		$data['suc_mes'] = '';
		$data['suc_mes1'] = '';
		$data['suc_mes2'] = '';
	   
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['bank'] = $this->bank_model->get_bank($bid,'');

		
		
		
		//$data['bank_metrics'] = $this->bank_model->get_bank_metrics($bid);
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/banks_rates', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function banks_rates_edit($rateid)
	{
		$data['suc_mes'] = '';
		$data['suc_mes1'] = '';
		$data['suc_mes2'] = '';
	   
		$data['settings'] = $this->setting_model->get_setting();
		
		//$data['bank'] = $this->bank_model->get_bank($bid,'');
		$this->load->model('bank_rate_grid_model');
		$data['bank_rate_group'] = $this->bank_rate_grid_model->get_rate($rateid);
		
		
		
		//$data['bank_metrics'] = $this->bank_model->get_bank_metrics($bid);
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/banks_rates_edit', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
		public function banks_rates_add($bid)
	{
		$data['suc_mes'] = '';
		$data['suc_mes1'] = '';
		$data['suc_mes2'] = '';
	   
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['bank'] = $this->bank_model->get_bank($bid,'');
		//$this->load->model('bank_rate_grid_model');
		//$data['bank_rate_group'] = $this->bank_rate_grid_model->get_rate($rateid);
		
		
		
		//$data['bank_metrics'] = $this->bank_model->get_bank_metrics($bid);
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/banks_rates_add', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function banks_rates_del($rateid)
	{
		$data['suc_mes'] = '';
		$data['suc_mes1'] = '';
		$data['suc_mes2'] = '';
	   
		$data['settings'] = $this->setting_model->get_setting();
		
		//$data['bank'] = $this->bank_model->get_bank($bid,'');
		$this->load->model('bank_rate_grid_model');
		$data['bank_rate_group'] = $this->bank_rate_grid_model->get_rate($rateid);
		
		
		
		//$data['bank_metrics'] = $this->bank_model->get_bank_metrics($bid);
		
		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/banks_rates_del', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
////////////////////////////////////////////////////////
// INVENTORY
////////////////////////////////////////////////////////
	
	public function inventory_list($did,$page = 0)
	{
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['did'] = $did;
		
		// Add new inventory
		$data['suc_mes'] = '';
		if ($this->input->post('act') == 'add') {
			
			$odo = str_replace(',','',$this->input->post('inventory_odometer'));
			$cost = str_replace(',','',$this->input->post('inventory_cost'));
			$cost = str_replace('$','',$cost);
			
			$this->inventory_model->do_inventory($this->input->post('did'),
												 $this->input->post('inventory_name'),
													$this->input->post('inventory_nada'), 
													$this->input->post('inventory_stk'),
													$this->input->post('inventory_make'), 
													$this->input->post('inventory_model'), 
													$this->input->post('inventory_year'), 
													$this->input->post('inventory_age'),
													$odo, 
													$cost
													);
			
			$data['suc_mes'] = 'New Inventory Item Added';
			
			
			
		} elseif ($this->input->post('act') == 'edit') {
		// edit inventory	
		
			$odo = str_replace(',','',$this->input->post('inventory_odometer'));
			$cost = str_replace(',','',$this->input->post('inventory_cost'));
			$cost = str_replace('$','',$cost);
			
			$this->inventory_model->set_inventory($this->input->post('iid'),
													$did,
												  $this->input->post('inventory_name'),
													$this->input->post('inventory_nada'), 
													$this->input->post('inventory_stk'),
													$this->input->post('inventory_make'), 
													$this->input->post('inventory_model'), 
													$this->input->post('inventory_year'), 
													$this->input->post('inventory_age'),
													$odo, 
													$cost
													);
			
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

$targetpage = "index.php?/administrator/inventory_list/"; 

$total_pages = count($this->inventory_model->get_inventory($did,100000000,0));	

$data['inventory_list'] = $this->inventory_model->get_inventory($did,$limit,$start);			

$data['pagination'] = $this->pagenate_model->pagenate_me($tbl_name,$total_pages,$limit,$page,$targetpage,$start);


////// end get all inventorys ////////
///////// end pagenation ///////////


		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/inventory_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function inventory_add($did)
	{
		$data['settings'] = $this->setting_model->get_setting();
		
		$data['suc_mes'] = '';
		$data['err_mes'] = '';
		$data['data_file'] = '';
		$data['did'] = $did;
		$data['tab'] = '';

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/inventory_add', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function inventory_edit($iid)
	{	
	
		$data['settings'] = $this->setting_model->get_setting();

		$data['inventory'] = $this->inventory_model->get_one_inventory($iid);

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/inventory_edit', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	public function inventory_del($did,$iid)
	{
	
		$data['settings'] = $this->setting_model->get_setting();
		$data['did'] = $did;
		
		$this->inventory_model->delete_inventory($iid);
		
///////// pagenation ///////////
////// get all inventory ////////

$page = 0;

$tbl_name = 'inventory';

$limit = $this->pagenate_model->get_limit();
	
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;	

$targetpage = "index.php?/administrator/inventory_list/"; 

$total_pages = count($this->inventory_model->get_inventory($did,100000000,0));	

$data['inventory_list'] = $this->inventory_model->get_inventory($did,$limit,$start);			

$data['pagination'] = $this->pagenate_model->pagenate_me($tbl_name,$total_pages,$limit,$page,$targetpage,$start);


////// end get all inventorys ////////
///////// end pagenation ///////////

		
		$data['suc_mes'] = 'Inventory Item Deleted';

		$this->load->view('templates/admin/heading', $data);
		$this->load->view('templates/admin/header', $data);
		$this->load->view('administrator/inventory_list', $data);
		$this->load->view('templates/admin/footer', $data);			
		$this->load->view('administrator/leftmenu', $data);
		
	}
	
	
}

?>