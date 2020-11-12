<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Mfrontfaq extends MY_Model {
        function __construct() { 
            parent::__construct(); 
            
        }

        function GetList() {
            $lang = $this->cur_lang;
    		$sql="select id,title_$lang as title, description_$lang as description, status from faq where status='1'";
    		$data = $this->db->query($sql)->result();
    		$data = count($data) > 0 ? $data : array();
            return $data;
        }  

        
    }