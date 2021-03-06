<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mfrontdownloads extends MY_Model {
         var $TotalRows;
        function __construct() { 

            parent::__construct(); 

            $this->TotalRows = 0;

            

        }


        //GEtting the list contents dynamically Meeraj 
        function GetListContents($cat_id) {

            $lang = $this->cur_lang;

            $sql = "SELECT D.id,D.title_$lang as title,D.file, D.description_$lang as description,D.CreatedOn,DC.id as c_id, DC.title_$lang as cat_title
                    FROM downloads as D
                    LEFT JOIN tbl_download_category as DC  
                    on  D.category = DC.id 
                    WHERE D.category = '$cat_id'
                    AND D.status = 1";

            $data = $this->db->query($sql)->result();

            $data = count($data) > 0 ? $data : array();

            return $data;

        }  

        //Getting only the downloads category list on left side menu Meeraj
        function GetList() {

            $lang = $this->cur_lang;

            // $sql = "SELECT D.id,D.title_$lang as title,D.file, D.description_$lang as description,D.CreatedOn,DC.id as c_id, DC.title_$lang as cat_title
            //         FROM downloads as D
            //         LEFT JOIN tbl_download_category as DC  
            //         on  D.category = DC.id 
            //         WHERE D.status = 1
            //         GROUP BY DC.title_en";
                    
                //   $sql = "SELECT DC.title_en,D.id,D.title_$lang as title,D.file, D.description_$lang as description,D.CreatedOn,DC.id as c_id, DC.title_$lang as cat_title
                //     FROM downloads as D
                //     LEFT JOIN tbl_download_category as DC  
                //     on  D.category = DC.id 
                //     WHERE D.status = 1 and DC.title_en is not null
                //     GROUP BY DC.title_en,D.id";  
                
                 $sql = "SELECT D.id,D.title_$lang as title,D.CreatedOn
                            FROM tbl_download_category as D
                            WHERE D.status = 1";

            $data = $this->db->query($sql)->result();

            $data = count($data) > 0 ? $data : array();

            return $data;

        }  

        function GetDetails($id){

            $lang = $this->cur_lang;

            $sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and id='$id'";

            $diff_array = $this->db->query($sql)->result();

            $page_data = count($diff_array) > 0 ? $diff_array[0] : redirect(base_url());;

            return $page_data;

        }

        function GetAdminList($Offset,$Limit){
            $lang=$this->cur_lang;
            $this->sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' order by id desc ";
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }

        function GetDocumentList() {

            $lang = $this->cur_lang;

            $sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='1'";

            $data = $this->db->query($sql)->result();

            $data = count($data) > 0 ? $data : array();

            return $data;

        }  

        function GetDocumentsDetails($id){

            $lang = $this->cur_lang;

            $sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and id='$id'";

            $diff_array = $this->db->query($sql)->result();

            $page_data = count($diff_array) > 0 ? $diff_array[0] : array();

            return $page_data;

        }

        function GetAdminDocumentsList($Offset,$Limit,$cat_id){
            $lang=$this->cur_lang;
            $this->sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category=$cat_id order by id desc ";

            $this->TotalRows = count($this->db->query($this->sql)->result());
            
            $this->sql.=" limit $Offset, $Limit";

            // print_r($this->sql);

            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }

        function GetCircularsList() {

            $lang = $this->cur_lang;

            $sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='2' order by id desc ";

            $data = $this->db->query($sql)->result();

            $data = count($data) > 0 ? $data : array();

            return $data;

        }  

        function GetCircularsDetails($id){

            $lang = $this->cur_lang;

            $sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and id='$id'";

            $diff_array = $this->db->query($sql)->result();

            $page_data = count($diff_array) > 0 ? $diff_array[0] : array();

            return $page_data;

        }

        function GetAdminCircularsList($Offset,$Limit){
            $lang=$this->cur_lang;
            $this->sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='2' order by id desc";
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }

        function GetBulletinsList() {

            $lang = $this->cur_lang;

            $sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='3' order by id desc";

            $data = $this->db->query($sql)->result();

            $data = count($data) > 0 ? $data : array();

            return $data;

        }  

        function GetBulletinsDetails($id){

            $lang = $this->cur_lang;

            $sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and id='$id'";

            $diff_array = $this->db->query($sql)->result();

            $page_data = count($diff_array) > 0 ? $diff_array[0] : array();

            return $page_data;

        }

        function GetAdminBulletinsList($Offset,$Limit){
            $lang=$this->cur_lang;
            $this->sql="select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='3' order by id desc ";
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }




        

    }