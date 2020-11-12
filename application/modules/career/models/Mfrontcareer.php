<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mfrontcareer extends MY_Model {
         var $TotalRows;
        function __construct() { 

            parent::__construct(); 

            $this->TotalRows = 0;

        }


        //GEtting the list contents dynamically Meeraj 
        function GetListContents() {

            $lang = $this->cur_lang;

            $sql = "SELECT D.id,D.title_$lang as title,D.file, D.description_$lang as description,D.CreatedOn
                    FROM career as D
                    AND D.status = 1";

            $data = $this->db->query($sql)->result();

            $data = count($data) > 0 ? $data : array();

            return $data;

        }  

        function GetAdminList($Offset,$Limit){
            $lang=$this->cur_lang;
            $this->sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from career where status='1' order by id desc ";
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }


    }