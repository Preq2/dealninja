<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Number Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/number_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
 *
 * @access	public
 * @param	mixed	// will be cast as int
 * @return	string
 */
if ( ! function_exists('byte_format'))
{
	function byte_format($num, $precision = 1)
	{
		$CI =& get_instance();
		$CI->lang->load('number');

		if ($num >= 1000000000000)
		{
			$num = round($num / 1099511627776, $precision);
			$unit = $CI->lang->line('terabyte_abbr');
		}
		elseif ($num >= 1000000000)
		{
			$num = round($num / 1073741824, $precision);
			$unit = $CI->lang->line('gigabyte_abbr');
		}
		elseif ($num >= 1000000)
		{
			$num = round($num / 1048576, $precision);
			$unit = $CI->lang->line('megabyte_abbr');
		}
		elseif ($num >= 1000)
		{
			$num = round($num / 1024, $precision);
			$unit = $CI->lang->line('kilobyte_abbr');
		}
		else
		{
			$unit = $CI->lang->line('bytes');
			return number_format($num).' '.$unit;
		}

		return number_format($num, $precision).' '.$unit;
	}
}


/* End of file number_helper.php */
/* Location: ./system/helpers/number_helper.php */

if ( ! function_exists('datim_format'))
{
	function datim_format($datim, $which)
	{
		$CI =& get_instance();
		$CI->lang->load('number');
		
		if ($which == 1) {
			
			$datim = date('m-d-Y',strtotime($datim));
			//$datim = 'gooddodod';
		}
		if ($which == 2) {
			
			$datim = date('Y-m-d',strtotime($datim)) . ' 00:00:00';
			//$datim = 'gooddodod';
		}
		if ($which == 3) {
			
			$datim = date('m-d-Y g:ia',strtotime($datim));
			//$datim = 'gooddodod';
		}
		if ($which == 4) {
			
			$datim = date('m/d/y',strtotime($datim));
			//$datim = 'gooddodod';
		}
		if ($which == 5) {
			
			$datim = date('D F j, Y g:ia',strtotime($datim));
			//$datim = 'gooddodod';
		}		
		return $datim;
	}
}



if ( ! function_exists('is_logged_in'))
{
	function is_logged_in($is,$want)
	{
		/*
		if ($level == 'administrator' || $level == 'lessor' || $level == 'customer') {
			
			$level = 
			
		} else {
			
		}
		*/	
			
			
		return $is . '--' . $want;
	}
}



if ( ! function_exists('pagination_custom'))
{
	function pagination_custom($rec_count = 0, $limit = 0, $offset = 0, $uri = '')
	{
		$out_string = '';
		$parts = floor($rec_count / $limit);
		$rem = $rec_count % $limit;
		
		if (($offset + $limit) > $rec_count) {
			$of_count = $offset + $rem;
		} else {
			$of_count = $offset + $limit;
		}
		
		$out_string = 'Displaying ' . ($offset + 1) . ' - ' . $of_count . '  of  ' . $rec_count . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		

		if ($offset > 0) {
			$tot = $offset - $limit;
			$out_string .= '<a href="javascript:;" class="darker" onclick="pagination_session(' . $tot . ',\'https://askmybookkeeper.com\');"><< previous</a>&nbsp;&nbsp;';			
		}		
		
		if ($rec_count > $of_count) {
			
			$tot = $offset + $limit;
			$out_string .= '<a href="javascript:;" class="darker" onclick="pagination_session(' . $tot . ',\'https://askmybookkeeper.com\');">next >></a>&nbsp;&nbsp;';
		}
		
		

		return $out_string;
	}
}

if ( ! function_exists('fix_checkbox_output'))
{
	function fix_checkbox_output($dat)
	{
		if ($dat != '') {
			return 1;
		} else {
			return 0;
		}


		
	}
}

if ( ! function_exists('encrypt_decrypt'))
{
	function encrypt_decrypt($action, $string) {
		
		$output = false;
	
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'Do you do, feel like I do 42';
		$secret_iv = 'wok are delisously spelled wrong';
	
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
	
		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			
		}
	
		return $output;
	}
}


if ( ! function_exists('pad_unpad_client_id'))
{
	function pad_unpad_client_id($cid,$pad) {
		
		if ($pad == 'pad') {
			
			if ($cid <= 9999) {
				
				$cid = str_pad($cid, 4, "0", STR_PAD_LEFT);
				$cid = '2356' . $cid;
				
			} else {
				$cid = str_pad($cid, 8, "1000", STR_PAD_LEFT);
			}	
			
		} else {
			if (strpos($cid, "2356") === 0) {
				
				$cid = substr($cid, -4);
				$cid = ltrim($cid, '0');
			} else {
				if (strpos($cid, "100") === 0) {
					$cid = substr($cid, -5);
				}
				if (strpos($cid, "10") === 0) {
					$cid = substr($cid, -6);
				}
				
			}
		}
	
		return $cid;
		
	}
}