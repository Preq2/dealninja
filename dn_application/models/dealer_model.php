<?php
class Dealer_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function get_dealer($id, $keyword = '', $search_type = '', $limit = 0, $offset = 0)
	{
		
		if ($id == 0) {
			
			if ($keyword != '') {

				$this -> db -> select('*');
				$this -> db -> from('dealer');
				$this -> db -> where("dealer_last_name LIKE '%" . $keyword . "%'");
				$this -> db -> where('dealer_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();					

			} else {

				$this -> db -> select('*');
				$this -> db -> from('dealer');
				$this -> db -> where('dealer_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();

			}
			
			return $query->result_array();			

		} else {
			
			$query = $this->db->get_where('dealer', array('dealer_id' => $id));
			return $query->row_array();			
			
		}
		


	}		
	
	public function set_dealer($dealer_id,$dealer_first,$dealer_last,$dealer_company,$dealer_address1,$dealer_address2,$dealer_city,$dealer_state,$dealer_zip,$dealer_phone,$dealer_email,$dealer_status,$dealer_level,$dealer_tax_rate,$dealer_title_fee,$dealer_doc_fee)
	{
		
		$data = array(
					   'dealer_first_name' => $dealer_first,
					   'dealer_last_name' => $dealer_last,
					   'dealer_company' => $dealer_company,
					   'dealer_address1' => $dealer_address1,
					   'dealer_address2' => $dealer_address2,
					   'dealer_city' => $dealer_city,
					   'dealer_state' => $dealer_state,
					   'dealer_zip' => $dealer_zip,
					   'dealer_phone' => $dealer_phone,					
					   'dealer_email' => $dealer_email,
					   'dealer_status' => $dealer_status,
					   'dealer_level' => $dealer_level,
					   'dealer_tax_rate' => $dealer_tax_rate,
					   'dealer_title_fee' => $dealer_title_fee,
					   'dealer_doc_fee' => $dealer_doc_fee
					   
					);


		
		$this->db->where('dealer_id', $dealer_id);
		$this->db->update('dealer', $data); 
		
		return 1;
	}

	public function do_dealer($uid,$dealer_first,$dealer_last,$dealer_company,$dealer_address1,$dealer_address2,$dealer_city,$dealer_state,$dealer_zip,$dealer_phone,$dealer_email,$dealer_status,$dealer_level,$dealer_tax_rate,$dealer_title_fee,$dealer_doc_fee)
	{


		$data = array('user_id' => $uid,
					   'dealer_first_name' => $dealer_first,
					   'dealer_last_name' => $dealer_last,
					   'dealer_company' => $dealer_company,
					   'dealer_address1' => $dealer_address1,
					   'dealer_address2' => $dealer_address2,
					   'dealer_city' => $dealer_city,
					   'dealer_state' => $dealer_state,
					   'dealer_zip' => $dealer_zip,
					   'dealer_phone' => $dealer_phone,					
					   'dealer_email' => $dealer_email,
					   'dealer_status' => $dealer_status,
					   'dealer_level' => $dealer_level,
					   'dealer_tax_rate' => $dealer_tax_rate,
					   'dealer_title_fee' => $dealer_title_fee,
					   'dealer_doc_fee' => $dealer_doc_fee					   
					);
		
		$this->db->insert('dealer', $data); 
		
		$did = $this->db->insert_id();
		
		return $did;
		

	}
	
	public function delete_dealer($dealer_id,$user_id)
	{

		$data = array('dealer_is_deleted' => 1);
		
		$this->db->where('dealer_id', $dealer_id);
		$this->db->update('dealer', $data); 
		
		$data = array('user_is_deleted' => 1);
		
		$this->db->where('user_id', $user_id);
		$this->db->update('user', $data); 		
		
		return 1;
	}


}

?>