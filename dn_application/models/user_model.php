<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function get_user($id, $keyword = '', $limit = 0, $offset = 0, $level)
	{
		
		if ($id == 0) {
			
			if ($keyword != '') {

				$this -> db -> select('*');
				$this -> db -> from('user');
				$this -> db -> where("user_last_name LIKE '%" . $keyword . "%'");
				$this -> db -> where('user_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();					

			} else {

				$this -> db -> select('*');
				$this -> db -> from('user');
				$this -> db -> where("user_level_id = " . $level);
				$this -> db -> where('user_is_deleted = 0');
				$this -> db -> limit($limit);
				$this -> db -> offset($offset);

				$query = $this -> db -> get();

			}
			
			return $query->result_array();			

		} else {
			
			$query = $this->db->get_where('user', array('user_id' => $id));
			return $query->row_array();			
			
		}
		


	}		
	
	public function set_user($user_id,$user_first,$user_last,$user_email,$user_password)
	{
		
		
		
		if ($user_password != '') {
			
			$user_password = do_hash($user_password, 'md5');
			
			$data = array(
						   'user_first_name' => $user_first,
						   'user_last_name' => $user_last,
						   'user_email' => $user_email,					
						   'user_password' => $user_password
						
						);
			
		} else {
			
			$data = array(
						   'user_first_name' => $user_first,
						   'user_last_name' => $user_last,
						   'user_email' => $user_email
						
						);
			
			
		}


		
		$this->db->where('user_id', $user_id);
		$this->db->update('user', $data); 
		
		return 1;
	}

	public function do_user($user_first,$user_last,$user_email,$user_password,$user_level_id)
	{
		
		$user_password = do_hash($user_password, 'md5');

		$data = array(
					   'user_first_name' => $user_first,
					   'user_last_name' => $user_last,
					   'user_email' => $user_email,					
					   'user_password' => $user_password,					
						'user_level_id' => $user_level_id
					);
		
		$this->db->insert('user', $data); 
		
		return $this->db->insert_id();
	}
	
	public function delete_user($user_id)
	{

		$data = array('user_is_deleted' => 1);
		
		$this->db->where('user_id', $user_id);
		$this->db->update('user', $data); 
		
		return 1;
	}





	public function get_setting()
	{

		$this -> db -> select('*');
		$this -> db -> from('setting');

		$query = $this -> db -> get();
		$setting = $query->row_array();
		return $setting;
	}	

}