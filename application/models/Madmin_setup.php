<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Madmin_setup extends MY_Model {

	function __construct(){
        parent::__construct();
    }

    function getParentMenu(){
        $data = $this->db->where('parent_id', NULL)
                ->order_by('show_order', 'DESC')
                ->get('menu')
                ->result();
    	return $data;
    }

    function getMenuList(){
        $data = $this->db->where('show_menu', '1')
                ->order_by('show_order', 'ASC')
                ->get('menu')
                ->result();
    	return $data;
    }

    function getNullParentMenu(){
        $data = $this->db->where('parent_id', NULL)
                ->get('menu')
                ->result();
    	return $data;
    }

    function getChildMenu($parent){
        $data = $this->db->where_in('id', $parent)
                ->get('menu')
                ->result();
    	return $data;
    }

    function loginCheck($username, $password){
       $data = $this->db->select('id, username, created_on, usertype')
                ->where('username', $username)
                ->where('password', $password)
                ->get('tbl_admin_user')
                ->row();
       return $data;
    }

    function getAdminSettingData($value){
        $data = $this->db->select('key_title')
                ->where('key_value', $value)
                ->get('tbl_admin_setting')
                ->row();
       return $data->key_title;
    }

    function getUserRoleMenu($userid){
        $sql = "SELECT MenuID FROM usertyperoles WHERE UserTypeID = '".$_SESSION['user_type']."'";
        $data = $this->db->query($sql)->row();
        return $data;
    }
    function getAssignMenuParentId($menuid){
        $sql = "SELECT parent_id FROM menu WHERE id = '".$menuid."'";
        $data = $this->db->query($sql)->row();
        return $data;
    }
}