<?php 
	
	/**
    * CodeIgniter Page Model Class
    *
    * @package     CodeIgniter
    * @subpackage          Models
    * @category            Models
    * @author      Nivaj Shakya<nivajshakya@gmail.com>
    * @link        http://codeigniter.com/user_guide/libraries/config.html
    */

	function p($a) {
		echo "<pre>";
			print_r($a);
		echo "</pre>";
	}

	function pe($a) {
		echo "<pre>";
			print_r($a);
		echo "</pre>";
		exit();
	}

	function pquery(){		
        $ci = &get_instance();
		p($ci->db->last_query());
	}
	function pequery(){		
        $ci = &get_instance();
		p($ci->db->last_query());
		exit();
	}