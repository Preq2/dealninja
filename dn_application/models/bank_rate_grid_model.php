<?php
class Bank_rate_grid_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

    public function get_rate($rate_id)
    {
    	//Get the rate

    	$this->db->select('*');
    	$this->db->from('bank_rate_grid');
		$this->db->where('id_bank_rate_grid = ' . $rate_id);

		$query = $this->db->get();
		return $query->result_array();	
		

    }
	public function get_bank($id, $keyword = '', $search_type = '', $limit = 0, $offset = 0)
	{
		
		if ($id == 0) {
			
			if ($keyword != '') {

				$this -> db -> select('*');
				$this -> db -> from('bank');
				$this -> db -> where("bank_last_name LIKE '%" . $keyword . "%'");
				$this -> db -> where('bank_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();					

			} else {

				$this -> db -> select('*');
				$this -> db -> from('bank');
				$this -> db -> where('bank_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();

			}
			
			return $query->result_array();			

		} else {
			
			$query = $this->db->get_where('bank', array('bank_id' => $id));
			return $query->row_array();			
			
		}
		


	}		
	
	public function set_bank($bank_id,$bank_name,$bank_address1,$bank_address2,$bank_city,$bank_state,$bank_zip,$bank_phone,$bank_email,$bank_url)
	{
		
		$data = array(
					   'bank_name' => $bank_name,
					   'bank_address1' => $bank_address1,
					   'bank_address2' => $bank_address2,
					   'bank_city' => $bank_city,
					   'bank_state' => $bank_state,
					   'bank_zip' => $bank_zip,
					   'bank_phone' => $bank_phone,					
					   'bank_email' => $bank_email,
					   'bank_url' => $bank_url					   
					);


		
		$this->db->where('bank_id', $bank_id);
		$this->db->update('bank', $data); 
		
		return 1;
	}

	public function do_bank($bank_name,$bank_address1,$bank_address2,$bank_city,$bank_state,$bank_zip,$bank_phone,$bank_email,$bank_url)
	{
		


		$data = array(
					   'bank_name' => $bank_name,
					   'bank_address1' => $bank_address1,
					   'bank_address2' => $bank_address2,
					   'bank_city' => $bank_city,
					   'bank_state' => $bank_state,
					   'bank_zip' => $bank_zip,
					   'bank_phone' => $bank_phone,					
					   'bank_email' => $bank_email,
					   'bank_url' => $bank_url						   
					);
		
		$this->db->insert('bank', $data); 
		
		$bid = $this->db->insert_id();
		
		return $bid;
		

	}

	public function do_bank_metrics($bid)
	{

		$data = array('bank_id' => $bid);
		
		$this->db->insert('bank_metric', $data); 
		
		$bmid = $this->db->insert_id();
		
		return $bmid;
		

	}

	public function delete_bank($bank_id)
	{

		$data = array('bank_is_deleted' => 1);
		
		$this->db->where('bank_id', $bank_id);
		$this->db->update('bank', $data); 
		
		return 1;
	}

	

	public function get_bank_metrics($bid)
	{
		
		$query = $this->db->get_where('bank_metric', array('bank_id' => $bid));
		return $query->row_array();	
		

	}

	public function set_bank_metrics($bid,$bank_metric_fe_advance,$bank_metric_be_advance,$bank_metric_max_term)
	{

		$data = array(
					   'bank_metric_fe_advance' => $bank_metric_fe_advance,
					   'bank_metric_be_advance' => $bank_metric_be_advance,
					   'bank_metric_max_term' => $bank_metric_max_term
					);


		
		$this->db->where('bank_id', $bid);
		$this->db->update('bank_metric', $data); 
	}


	
	
}

?>