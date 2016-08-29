<?php


class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('login_model');
		$this->load->model('setting_model');

	}

	public function index()
	{
		$data['settings'] = $this->setting_model->get_setting();

		$data['bad_login'] = 0;

		if ($this->input->post('username')) {

			$data['login'] = $this->login_model->get_login($this->input->post('username'),$this->input->post('password'));		
			
		
			if ($data['login'] == '0') {
				
			
				
				$level = $this->session->userdata('user_level');
		
					
				
				if ($level == 'administrator') {
					
					$this->load->view('templates/admin/heading', $data);
					$this->load->view('templates/admin/header', $data);
					$this->load->view('administrator/dashboard', $data);
					$this->load->view('templates/admin/footer', $data);			
					$this->load->view('administrator/leftmenu', $data);				
					
				} else {

					$data['did'] = $this->session->userdata('dealer_id');
					
					$this->load->view('templates/admin/heading', $data);
					$this->load->view('templates/admin/header', $data);
					$this->load->view('account/dashboard_' . $level, $data);
					$this->load->view('templates/admin/footer', $data);			
					$this->load->view('account/leftmenu', $data);	
				
						
					
				}



	
			} else {
				
				$data['bad_login'] = 1;

				$data['login'] = '1';
				$this->load->view('templates/heading', $data);
				$this->load->view('templates/header', $data);
				$this->load->view('login', $data);
				$this->load->view('templates/footer', $data);			
			}
			
		} else {
				$data['login'] = '1';
				$this->load->view('templates/heading', $data);
				$this->load->view('templates/header', $data);
				$this->load->view('login', $data);
				$this->load->view('templates/footer', $data);	
		}

		
	}
	
    public function password_recovery($token = 0)
	{
		$data['settings'] = $this->setting_model->get_setting();
		
		
		$data['view_state'] = 1;
		$data['has_token'] = 0;
		
		$data['suc_mes'] = '';
		$data['err_mes'] = '';
		
		if ($this->input->post('act') == 'send_pr_email') {
			
			$data['token'] = $this->login_model->do_pr_email($this->input->post('pr_email'));
			//echo $data['token'] . '--------';
			if ($data['token'] != 0) {

				$reset_link = '';
				$reset_link .= base_url() . 'index.php?/login/password_recovery/' . $data['token'];
				$token = $data['token'];


				
           		 $subject = 'This is a test';
           		 $message = '<p>This message has been sent for testing purposes.</p>';
           		 $body = "Levar just testing stuff out";
           		 $from = "support@dealninja.us";
           		 $bcc = "levar.berry@edrivenent.com";
           		 $to = $this->input->post('pr_email');

				 $this->load->library('email');
				

				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'mail.dealwingman.com';
				$config['smtp_user'] = 'csupport@dealwingman.com';
				$config['smtp_pass'] = 'P@ssword4CS!';
				$config['smtp_port'] = 25;

				$this->email->initialize($config);

				
				$this->email->message('Use the following link to reset your password.  
					                  '  . $reset_link);

				 

           		  $result = $this->email
	                ->from($from)
	                ->reply_to('info@dealninja.us')    // Optional, an account where a human being reads.
	                ->to($to)
	                ->bcc($bcc)
	                ->subject($subject);
	               
	              


				if($this->email->send()) {
				    echo 'Sent';
				} else {
				    $this->email->print_debugger();
				}











				$data['suc_mes'] = 'Password Reset Email Sent.';
				$data['email'] = $this->input->post('pr_email');
				$data['view_state'] = 3;
				// $data['view_state'] . '--------';
			} else {

				$data['err_mes'] = 'The email you entered is not in our records. <br>';
				
			}
		}
		
		if ($this->input->post('act') == 'reset_password') {
			
			$this->login_model->reset_login( $this->input->post('uid'), $this->input->post('token'),$this->input->post('any_password'));
			$data['suc_mes'] = 'Your Password has been Reset';
			$data['view_state'] = 4;
			
			
		}
		
		if ($token != 0) {
			
			$arr_token = explode('::',$token);
			
			$data['uid'] = $arr_token[3];
			$data['token'] = $token;
			$data['has_token'] = 1;
			$data['view_state'] = 3;
			
		} else {
			
			//$data['view_state'] = 1;

		}

		$this->load->view('templates/heading', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('password_recovery', $data);
		$this->load->view('templates/footer', $data);	
							
		
	}

    public function logout()
	{
		$data['settings'] = $this->setting_model->get_setting();

		$newdata = array(
                   'user_id'  => '',
				   'dealer_id'  => '',
				   'user_level_id'  => '',
                   'user_level'  => '',
				   'user_name'  => ''
		   );

		$this->session->set_userdata($newdata);

		$data['bad_login'] = 0;
		
		$this->load->view('templates/heading', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('login', $data);
		$this->load->view('templates/footer', $data);							
		
	}

}
?>