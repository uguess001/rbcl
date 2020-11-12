<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mfrontnews extends MY_Model {
         var $TotalRows;
        function __construct() { 

            parent::__construct(); 

            $this->TotalRows = 0;
            

        }



        function GetList() {

            $lang = $this->cur_lang;

    		$sql="select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description from news where status='1'";

    		$data = $this->db->query($sql)->result();

    		$data = count($data) > 0 ? $data : array();

            return $data;

        }  



        function GetDetails($id){

            $lang = $this->cur_lang;

            $sql="select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description,slug from news where status='1' and slug='".urldecode($id)."'";
            //print_r($sql);exit();
            $diff_array = $this->db->query($sql)->result();

            $page_data = count($diff_array) > 0 ? $diff_array[0] : redirect(base_url());;

            return $page_data;

        }

        function GetAdminList($Offset,$Limit){
            $lang=$this->cur_lang;
            $this->sql="select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description,slug from news where status='1' and type=1 order by id desc ";
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";

            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        }

        function search_news()
        {
                          
            $match = $this->input->post('search');
           // $match = 'ceo';
            $this->db->like('title_en',$match);
            $this->db->or_like('description_en',$match);
            $query = $this->db->get('news');
            //print'<pre>';print_r($query->result());exit;  
            return $query->result();
        }

        
        //Getting latest news and notices for the news marquee in the front end Meeraj
        function getLatestNewsAndNotice($Offset,$Limit){
            $lang=$this->cur_lang;
            $this->sql="select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description,slug from news where status='1' and type=2 order by id desc ";
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";

            $result = $this->db->query($this->sql)->result();
       
               
            return $result;
        } 

        //Getting latest news and notices for the news marquee in the front end Meeraj
        function getLatestNewsAndNoticeDetail($id){

            $lang = $this->cur_lang;

            $sql="select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description,slug from news where status='1' and slug='".urldecode($id)."'";

            $diff_array = $this->db->query($sql)->result();

            $page_data = count($diff_array) > 0 ? $diff_array[0] : redirect(base_url());;

            return $page_data;

        }
        

    }