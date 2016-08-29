<?php
class Client_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function get_client($id, $keyword = '', $limit = 0, $offset = 0, $level)
	{
		
		if ($id == 0) {
			
			if ($keyword != '') {

				$this -> db -> select('*');
				$this -> db -> from('client');
				$this -> db -> where("client_last_name LIKE '%" . $keyword . "%'");
				$this -> db -> where('client_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();					

			} else {

				$this -> db -> select('*');
				$this -> db -> from('client');
				$this -> db -> where('client_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();

			}
			
			return $query->result_array();			

		} else {
			
			$query = $this->db->get_where('client', array('client_id' => $id));
			return $query->row_array();			
			
		}
		


	}		
	
	public function set_client($client_id,$client_first,$client_last,$client_email,$client_password)
	{
		
		
		
		if ($client_password != '') {
			
			$client_password = do_hash($client_password, 'md5');
			
			$data = array(
						   'client_first_name' => $client_first,
						   'client_last_name' => $client_last,
						   'client_email' => $client_email,					
						   'client_password' => $client_password
						
						);
			
		} else {
			
			$data = array(
						   'client_first_name' => $client_first,
						   'client_last_name' => $client_last,
						   'client_email' => $client_email
						
						);
			
			
		}


		
		$this->db->where('client_id', $client_id);
		$this->db->update('client', $data); 
		
		return 1;
	}

	public function do_client($client_first,$client_last,$client_address1,$client_address2,$client_city,$client_postcode,$client_dob,$client_email,$client_status,$debt_amount)
	{
		


		$data = array(
					   'client_first_name' => $client_first,
					   'client_last_name' => $client_last,
					   'client_address1' => $client_address1,
					   'client_address2' => $client_address2,
					   'client_city' => $client_city,
					   'client_postcode' => $client_postcode,
					   'client_dob' => $client_dob,					
					   'client_email' => $client_email,
					   'client_status' => $client_status
					);
		
		$this->db->insert('client', $data); 
		
		$cid = $this->db->insert_id();
		
		$data = array(
					   'client_id' => $cid,
					   'offer_debt_amount' => $debt_amount
					);
		
		$this->db->insert('offer', $data); 
		
		$data = array(
					   'client_id' => $cid
					);
		
		$this->db->insert('client_meta', $data); 
		
		return $cid;
		

	}
	
	public function delete_client($client_id)
	{

		$data = array('client_is_deleted' => 1);
		
		$this->db->where('client_id', $client_id);
		$this->db->update('client', $data); 
		
		return 1;
	}


	public function get_offer($cid)
	{

		$query = $this->db->get_where('offer', array('client_id' => $cid));
		return $query->row_array();			

	}



	public function get_setting()
	{

		$this -> db -> select('*');
		$this -> db -> from('setting');

		$query = $this -> db -> get();
		$setting = $query->row_array();
		return $setting;
	}	
	
	public function get_invoice($id, $date_range_start = '', $date_range_end = '', $limit = 0, $offset = 0)
	{
		
		if ($id == 0) {
			
			if ($date_range_start != '') {
/*
				$this -> db -> select('*');
				$this -> db -> from('invoice');
				$this -> db -> where("invoice_last_name LIKE '%" . $keyword . "%'");
				$this -> db -> where('invoice_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();					
*/
			} else {

				$this -> db -> select('*');
				$this -> db -> from('invoice');
				$this -> db -> where('invoice_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();

			}
			
			return $query->result_array();			

		} else {
			
			$query = $this->db->get_where('invoice', array('invoice_id' => $id));
			return $query->row_array();			
			
		}

	}	
	
	public function get_transaction($id, $date_range_start = '', $date_range_end = '', $limit = 0, $offset = 0)
	{
		
		if ($id == 0) {
			
			if ($date_range_start != '') {
/*
				$this -> db -> select('*');
				$this -> db -> from('transaction');
				$this -> db -> where("transaction_last_name LIKE '%" . $keyword . "%'");
				$this -> db -> where('transaction_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();					
*/
			} else {

				$this -> db -> select('*');
				$this -> db -> from('transaction');
				$this -> db -> where('transaction_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();

			}
			
			return $query->result_array();			

		} else {
			
			$query = $this->db->get_where('transaction', array('transaction_id' => $id));
			return $query->row_array();			
			
		}

	}
	
}

?>