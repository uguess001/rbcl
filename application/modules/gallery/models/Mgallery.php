<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Mgallery extends MY_Model{
		function __construct() {
			parent::__construct();
		}



		 function GetList() {
            $lang = $this->cur_lang;
            // in brackets count 
    		$sql="select id,image,title_en as title , (select count(*) from tbl_gallery_images where gallery_id=tbl_gallery.id) total from tbl_gallery where status=1";
    		$data = $this->db->query($sql)->result();
    		$data = count($data) > 0 ? $data : array();
            return $data;

        }



        function GetDetails($id){
            $lang = $this->cur_lang;
            $sql="select id,image, title_en as title,gallery_id from tbl_gallery_images where  gallery_id='$id'";
            $diff_array = $this->db->query($sql)->result();
            $page_data = count($diff_array) > 0 ? $diff_array : array();
            return $page_data;

        }

        function GetAlbum($id){
            $lang = $this->cur_lang;
            $sql="select id,title_en as title from tbl_gallery where id=$id and  status=1";
            $diff_array = $this->db->query($sql)->row();
            $page_data = count($diff_array) > 0 ? $diff_array : array();
            return $page_data;
        }



	}