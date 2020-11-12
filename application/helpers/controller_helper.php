<?php

function activate_status($ids, $model) {

    $ci = & get_instance();
    $data = array('status' => '1');
    $ids = explode('_', $ids);
 
    if (!empty($ids)) {
        foreach ($ids as $id) { 
            if ($ci->$model->update(intval($id), $data)) {
                $ci->session->set_flashdata('_flash_msg', array(
                    '_css_cls' => 'success',
                    '_message' => 'Successfully updated!'
                ));
            } else {
                $ci->session->set_flashdata('_flash_msg', array(
                    '_css_cls' => 'error',
                    '_message' => 'Could not be updated!'
                ));
            }
        }
    } else {
        $ci->session->set_flashdata('_flash_msg', array(
            '_css_cls' => 'error',
            '_message' => 'No record selected!'
        ));
    }
}

function deactivate_status($ids, $model) {
    
    $ci = & get_instance();
    $data = array('status' => '0');
    $ids = explode('_', $ids);

    if (!empty($ids)) {
        foreach ($ids as $id) {
            if ($ci->$model->update(intval($id), $data)) {
                $ci->session->set_flashdata('_flash_msg', array(
                    '_css_cls' => 'success',
                    '_message' => 'Successfully updated!'
                ));
            } else {
                $ci->session->set_flashdata('_flash_msg', array(
                    '_css_cls' => 'error',
                    '_message' => 'Could not be updated!'
                ));
            }
        }
    } else {
        $ci->session->set_flashdata('_flash_msg', array(
            '_css_cls' => 'error',
            '_message' => 'No record selected!'
        ));
    }
}

