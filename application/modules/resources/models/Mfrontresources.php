<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mfrontresources extends MY_Model {
         var $TotalRows;
        function __construct() { 

            parent::__construct(); 

            $this->TotalRows = 0;
            

        }



        function GetList() {

            $lang = $this->cur_lang;

    		$sql="select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description from resources where status='1'";

    		$data = $this->db->query($sql)->result();

    		$data = count($data) > 0 ? $data : array();

            return $data;

        }  



        function GetDetails($id){

            $lang = $this->cur_lang;

            $sql="select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description, slug from resources where status='1' and slug='$id'";

            $diff_array = $this->db->query($sql)->result();

            $page_data = count($diff_array) > 0 ? $diff_array[0] : redirect(base_url());;

            return $page_data;

        }

        function GetAdminList($Offset,$Limit){
            $lang=$this->cur_lang;
            $this->sql="select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description,slug from resources where status='1' order by id desc";
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }

        

        

    }