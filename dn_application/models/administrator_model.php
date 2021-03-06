<?php
class Administrator_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function do_email($email_text)
	{

		$data = array(
					   'email_text' => $email_text
					);
		
		$this->db->insert('email', $data); 
		
		return $this->db->insert_id();
	}	

	public function do_email_list($eid,$uid,$email_address)
	{

		$data = array(
					   'email_id' => $eid,
					   'user_id' => $uid,
					   'email_list_recipient' => $email_address
					);
		
		$this->db->insert('email_list', $data); 
		
		return 1;
	}


}

?>