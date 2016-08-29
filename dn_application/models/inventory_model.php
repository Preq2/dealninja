<?php
class Inventory_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function get_inventory($did, $limit = 0, $offset = 0)
	{
		
				$this -> db -> select('*');
				$this -> db -> from('inventory');
				$this -> db -> where('dealer_id = ' . $did);
				$this -> db -> order_by("inventory_id", "asc");
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();
			return $query->result_array();			
		



	}	
	
	public function get_one_inventory($iid)
	{

			$query = $this->db->get_where('inventory', array('inventory_id' => $iid));
			return $query->row_array();				

	}
	
	public function set_inventory($inventory_id,$did,$inventory_name,$inventory_nada,$inventory_stk,$inventory_make,$inventory_model,$inventory_year,$inventory_age,$inventory_odometer,$inventory_cost)
	{
		
		$data = array(
					   'dealer_id' => $did,
					   'inventory_name' => $inventory_name,
					   'inventory_nada' => $inventory_nada,
					   'inventory_stk' => $inventory_stk,
					   'inventory_make' => $inventory_make,
					   'inventory_model' => $inventory_model,
					   'inventory_year' => $inventory_year,
					   'inventory_age' => $inventory_age,
					   'inventory_odometer' => $inventory_odometer,					
					   'inventory_cost' => $inventory_cost
					);


		
		$this->db->where('inventory_id', $inventory_id);
		$this->db->update('inventory', $data); 
		
		return 1;
	}

	public function do_inventory($did,$inventory_name,$inventory_nada,$inventory_stk,$inventory_make,$inventory_model,$inventory_year,$inventory_age,$inventory_odometer,$inventory_cost)
	{
		
			
		$ins = "INSERT INTO inventory (dealer_id,
								  inventory_name, 
								  inventory_nada,
								  inventory_stk,
								  inventory_make,
								  inventory_model,
								  inventory_year,
								  inventory_age,
								  inventory_odometer,
								  inventory_cost
								  ) VALUES (
								  " . $_GET['did'] . ",
								  '" . addslashes($arr_data[$i]['name']) . "',
								  '" . addslashes($arr_data[$i]['nada']) . "',
								  '" . addslashes($arr_data[$i]['stk']) . "',
								  " . $arr_data[$i]['year'] . ",
								  '" . addslashes($arr_data[$i]['make']) . "',
								  '" . addslashes($arr_data[$i]['model']) . "',
								  " . $arr_data[$i]['age'] . ",
								  " . $odo . ",
								  " . $cost . "
								  )";	


		$data = array('dealer_id' => $did,
					   'inventory_name' => $inventory_name,
					   'inventory_nada' => $inventory_nada,
					   'inventory_stk' => $inventory_stk,
					   'inventory_make' => $inventory_make,
					   'inventory_model' => $inventory_model,
					   'inventory_year' => $inventory_year,
					   'inventory_age' => $inventory_age,
					   'inventory_odometer' => $inventory_odometer,
					   'inventory_cost' => $inventory_cost
					   
					);
		
		$this->db->insert('inventory', $data); 
		
		$did = $this->db->insert_id();
		
		return $did;
		

	}
	
	public function delete_inventory($inventory_id)
	{

		$this->db->delete('inventory', array('inventory_id' => $inventory_id)); 
		
		return 1;
	}


}

?>