<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	

	public function get_login($username, $password)
	{
		
		
		$this -> db -> select('*');
		$this -> db -> from('user');
		$this -> db -> where('user_email = ' . "'" . $username . "'");
		$this -> db -> where('user_password = ' . "'" . do_hash($password, 'md5') . "'");
		$this -> db -> where('user_is_deleted = 0');
		$this -> db -> limit(1);

		$query = $this -> db -> get();
		
		$user = $query->row_array();
		

		
		if($query -> num_rows() == 1) {
			
			$this -> db -> select('*');
			$this -> db -> from('user_level');
			$this -> db -> where('user_level_id = ' . $user['user_level_id']);
			$this -> db -> limit(1);		
	
			$query2 = $this -> db -> get();
			
			$user_level = $query2->row_array();		
			
			$did = '';

			if ($user_level['user_level_name'] != 'administrator') {

				$this -> db -> select('*');
				$this -> db -> from('dealer');
				$this -> db -> where('user_id = ' . $user['user_id']);
				$this -> db -> limit(1);				
				$query2 = $this -> db -> get();
				$dealer = $query2->row_array();
				
				$did = $dealer['dealer_id'];

			}
			
			$newdata = array(
                   'user_id'  => $user['user_id'],
				   'dealer_id'  => $did,
				   'user_level_id'     => $user['user_level_id'],
                   'user_level'     => $user_level['user_level_name'],
				   'user_name'  => $user['user_first_name'] . ' ' . $user['user_last_name']
               );

			$this->session->set_userdata($newdata);
				
			return '0';
		} else {
			$_SESSION['user_id'] = '';
			$_SESSION['dealer_id'] = '';
			$_SESSION['user_level_id'] = '';
			$_SESSION['user_level'] = '';
			$_SESSION['user_name'] = '';


			return '1';
		}

	}
	
	
	public function do_pr_email($email)
	{
		$token = '';
		
		$this -> db -> select('*');
		$this -> db -> from('user');
		$this -> db -> where('user_email = ' . "'" . $email . "'");
		$this -> db -> where('user_is_deleted = 0');
		$this -> db -> limit(1);

		$query = $this -> db -> get();
		
		if($query -> num_rows() == 1) {
			
			$user = $query->row_array();
			
			$token .= do_hash($user['user_last_name'],'md5') . '::' . $user['user_password'] . '::' . do_hash(time(),'md5') . '::' . $user['user_id'] . '::';
			
			$data = array('user_password_reset_token' => $token);
			
			$this->db->where('user_id', $user['user_id']);
			$this->db->update('user', $data); 
			
			return $token;			
			
		} else {
			
			return '0';
			
		}
		

	}

	public function reset_login($uid, $token, $password)
	{
		
		
			$data = array('user_password_reset_token' => '','user_password' => do_hash($password, 'md5'));
			
			$this->db->where('user_password_reset_token', $token);
			$this->db->where('user_id', $uid);
			$this->db->update('user', $data);

	}	
	
	
}

?>