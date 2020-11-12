<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mfrontstaffs extends MY_Model {
function __construct() {
parent::__construct();

}
function GetList() {
$lang = $this->cur_lang;
// var_dump($lang);
// die();
        $sql="SELECT id,image, name_$lang as name, designation_$lang as designation, post_$lang as post, phone, email,status FROM staffs WHERE status = '1' ORDER BY group_order ASC";
        $data = $this->db->query($sql)->result();
        $data = count($data) > 0 ? $data : array();
return $data;
}
}