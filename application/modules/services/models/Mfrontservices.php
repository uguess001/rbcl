<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mfrontservices extends MY_Model {
    function __construct() {
        parent::__construct();
    }

    function GetList() {
        $lang = $this->cur_lang;
        $sql="SELECT id,image,title_$lang as title, description_$lang as description,slug from services where status='1'";
        $data = $this->db->query($sql)->result();
        $data = count($data) > 0 ? $data : array();
        return $data;
    }

    function getDetails($id){
        $lang = $this->cur_lang;
        $sql = "SELECT id,image,title_$lang as title, description_$lang as description from services where status='1' and slug='$id'";
        $data = $this->db->query($sql)->row();
        return $data;
    }
}