<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mfrontreports extends MY_Model {
        var $TotalRows;
        function __construct() { 

            parent::__construct(); 

            $this->TotalRows = 0;

            

        }



        function GetList() {

            $lang = $this->cur_lang;

    		$sql="SELECT R.id,R.fiscal_year,R.file,R.status,R.CreatedOn,R.title_$lang as title, R.description_$lang as description,
                     R.status,F.year,F.id as fis_id
                    from reports as R 
                    RIGHT join fiscal_year as F
                    ON F.id = R.fiscal_year
                    where R.status='1'";

    		$data = $this->db->query($sql)->result();

    		$data = count($data) > 0 ? $data : array();

            return $data;

        }  



        function GetDetails($id){

            $lang = $this->cur_lang;

            $sql="select id,fiscal_year,CreatedOn,file,status,title_$lang as title, description_$lang as description, slug from reports where status='1' and slug='$id'";

            $diff_array = $this->db->query($sql)->result();

            $page_data = count($diff_array) > 0 ? $diff_array[0] : redirect(base_url());

            return $page_data;

        }

        function GetAdminList($Offset,$Limit){
            $lang=$this->cur_lang;
            // $this->sql="select id,fiscal_year,file,status,CreatedOn,title_$lang as title, description_$lang as description, status, slug from reports where status='1' order by id desc";

            $this->sql = "SELECT id as fis_id,year from fiscal_year where status=1 order by id desc";

            /*$this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";*/
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }

        function GetAdminListByFiscalYear($Offset,$Limit){
            $lang=$this->cur_lang;
            // $this->sql="select id,fiscal_year,file,status,CreatedOn,title_$lang as title, description_$lang as description, status, slug from reports where status='1' order by id desc";

            $this->sql = "SELECT R.id,R.fiscal_year,R.file,R.status,R.CreatedOn,R.title_$lang as title, R.description_$lang as description,
                             R.status,R.slug,F.year,F.id as fis_id
                            from reports as R 
                            RIGHT join fiscal_year as F
                            ON F.id = R.fiscal_year
                            where R.status='1'";

            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }

        function GetFiscalYearData($Offset,$Limit){
            $lang=$this->cur_lang;
            // $this->sql="select id,fiscal_year,file,status,CreatedOn,title_$lang as title, description_$lang as description, status, slug from reports where status='1' order by id desc";

            $this->sql = "SELECT R.id,R.fiscal_year,R.file,R.status,R.CreatedOn,R.title_$lang as title, R.description_$lang as description,
                             R.status,R.slug
                            from reports as R 
                            where R.status='1'";

            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }

        

        

    }