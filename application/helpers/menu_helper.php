<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Get Parent Menu Items
 */
function get_cmenu($parent_id)
{
    $ci = & get_instance();
    $menu_c = $ci->db->select('*')
                    ->where('parent_id', $parent_id)
                    ->order_by('show_order', 'asc')
                    ->get('menu')->result();
    return $menu_c;
}

function get_parent_menu() {
    $ci = & get_instance();
    $menu_p = $ci->db->select('*')
                    ->where('parent_id', NULL)
                    ->where('show_menu', '1')
                    ->order_by('show_order', 'asc')
                    ->get('menu')->result();

    return $menu_p;
}

function get_all_child_menu() {
    $ci = & get_instance();
    $menu_p = $ci->db->select('*')
                    ->where('slug !=', "")
                    ->where('show_menu', '1')
                    ->order_by('id', 'asc')
                    ->get('menu')->result();
                    
    return $menu_p;
}

function get_child_menu($parent_id) {
    $ci = & get_instance();

    $logged_in_userid = $ci->session->userdata('user_type');

    $menu_str = $ci->db->select('usertyperoles.MenuID')
                    ->where('usertyperoles.UserTypeID', $logged_in_userid)                    
                    ->get('usertyperoles')->row();

    if ($menu_str) {
        $menu_arr = explode(',', $menu_str->MenuID);

        $menu_c = $ci->db->select('menu.*')
                        ->where('menu.parent_id', $parent_id)
                        ->where_in('menu.id', $menu_arr)
                        ->where('show_menu', '1')
                        ->order_by('show_order', 'asc')
                        ->get('menu')->result();
        return $menu_c;
    } else {
        return '';
    }
}
