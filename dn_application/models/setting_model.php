<?php
class Setting_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	
	public function set_setting( $setting_company_name, $setting_url, $setting_email_support, $setting_phone_support, $setting_email_admin, $setting_email_test, $setting_email_template_top, $setting_email_template_bottom,$setting_email_welcome_subject,$setting_email_welcome_body,$setting_email_password_reset_subject,$setting_email_password_reset_body) {

		$data = array('setting_company_name' => $setting_company_name,'setting_url' => $setting_url,'setting_email_support' => $setting_email_support,'setting_phone_support' => $setting_phone_support,'setting_email_admin' => $setting_email_admin,'setting_email_test' => $setting_email_test,'setting_email_template_top' => $setting_email_template_top,'setting_email_template_bottom' => $setting_email_template_bottom,'setting_email_welcome_subject' => $setting_email_welcome_subject,'setting_email_welcome_body' => $setting_email_welcome_body,'setting_email_password_reset_subject' => $setting_email_password_reset_subject,'setting_email_password_reset_body' => $setting_email_password_reset_body);
		
		$this->db->where('setting_id', 1);
		$this->db->update('setting', $data); 
		
		return 1;
		//return $setting_id.'-'.$setting_name.'-'.$setting_description.'-'.$setting_price.'-'.$setting_duration_days.'-'.$setting_display_order;
		
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
	



?>