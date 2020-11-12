<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Mfrontlinks extends MY_Model {
        function __construct() { 
            parent::__construct(); 
            
        }

        function GetList() {
            $lang = $this->cur_lang;
    		$sql="select id,status,category,url,title_$lang as title from links where status='1'";
    		$data = $this->db->query($sql)->result();
    		$data = count($data) > 0 ? $data : array();
            return $data;
        }  

        function GetDetails($id){
            $lang = $this->cur_lang;
            $sql="select id,status,category,url,title_$lang as title from links where status='1' and category='$id'";
            $diff_array = $this->db->query($sql)->result();
            $page_data = count($diff_array) > 0 ? $diff_array[0] : array();
            return $page_data;
        }
        function GetAdminList($Offset,$Limit){
            $lang=$this->cur_lang;
            $this->sql="select id,status,category,url,title_$lang as title from links where status='1'";
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }
        
    }