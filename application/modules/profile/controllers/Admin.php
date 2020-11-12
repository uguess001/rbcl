<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    function __construct() {
        parent::__construct();
        parent::index();
        $this->load->model('Mprofileadmin');
        $this->url ='profile';
        $this->table_name ='tbl_user';
        $this->PageLimit = 10;
    }

    function index() {
        $this->record('list');
    }

    function record($cipher='null', $id='null') {
        if($this->input->post('process', TRUE) == 'true') {
            $changepwd = $this->input->post('changepwd', TRUE);
            if ($changepwd == 'true') {
               /* old password match logic starts */
                $userid = $this->session->userdata('userid');
                $oldpassword = md5($this->input->post('oldpassword', TRUE));
                $profile = $this->Mprofileadmin->checkOldPassword($userid, $oldpassword);
                if(!empty($profile)){
                    if( $this->Mprofileadmin->save()) {
                        $this->session->set_flashdata('_flash_msg', array(
                            '_css_cls'  => 'success',
                            '_message'  => 'Successfully Updated',
                        ));
                        update_dop_user_log('has added '.$this->table_name);
                    }
                    else {
                        $this->session->set_flashdata('_flash_msg', array(
                            '_css_cls'  => 'error',
                            '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                            ));
                    }
                } else {
                    $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => "Error : Old Password Doesn't Match" ,
                    ));
                }

                intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->url.'/record/view', 'refresh'):
                redirect('admin/'.$this->url.'/record/view', 'refresh');
                exit();

                /* old password match logic ends */
            } else {
                if( $this->Mprofileadmin->save()) {
                    $this->session->set_flashdata('_flash_msg', array(
                        '_css_cls'  => 'success',
                        '_message'  => 'Successfully Updated',
                    ));
                    update_dop_user_log('has added '.$this->table_name);
                }
                else {
                    $this->session->set_flashdata('_flash_msg', array(
                        '_css_cls'  => 'error',
                        '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                        ));
                }
                intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->url.'/record/view', 'refresh'):
                redirect('admin/'.$this->url.'/record/view', 'refresh');
                exit();
            }
        }

        if(isset($cipher) && is_numeric($this->Encryption->decode($cipher)) ) {
            $id = $this->Encryption->decode($cipher);
            $record = $this->Mprofileadmin->pickRecord($cipher);
            $data_content   =  array(
                    'page_header'              => 'Add/Edit Profile Details',
                    'url'                      => $this->url,
                    'record'                   => $record,
                );

            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
            $this->template->render();
        }

        elseif(isset($cipher) && $cipher=="list") {
            $result = $this->Mprofileadmin->getAdminList();
            $data = array (
                   'list'                   => $result,
                   'url'                    => $this->url,
                   'page_header'            => 'List of Profile',
                );

            $this->template->write_view('content', 'admin/report', $data, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="create") {
        	$sectionlist = $this->Mprofileadmin->getSectionLinkList();
            $data_content =array (
                    'page_header'              => 'Edit Publish Profile',
                    'url'                      => $this->url,
                    'sectionlist'              => $sectionlist,
                );

            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="view") {
            $userid = $this->session->userdata('userid');
            $result = $this->Mprofileadmin->getProfileView($userid);
            $data = array (
                   'list'                   => $result,
                   'url'                    => $this->url,
                   'page_header'            => 'Profile View',
                );

            $this->template->write_view('content', 'admin/view', $data, TRUE);
            $this->template->render();
        }

        elseif(isset($cipher) && $cipher=="editprofile" && isset($id)) {
            $userid = $this->session->userdata('userid');
            $record = $this->Mprofileadmin->pickRecord($id);
            $data = array (
                   'record'                     => $record,
                   'url'                        => $this->url,
                   'page_header'                => 'Edit Profile Details',
                );

            $this->template->write_view('content', 'admin/editprofile', $data, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="deactivate" && isset($id)) {

            $id = $this->Encryption->decode($id);
            $this->deactivate($id);
            $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 'Record Deleted'
                    ));
            redirect('admin/'.$this->url.'/record/list', 'refresh');
        }
        else{
            redirect(base_url().'admin','refresh');
        }
    }

    function deactivate($id) {
        $data_content   =  array(
                'page_header'   => 'Delete Records',
                'record'        => $this->Mprofileadmin->deactivate($id)
                );
        return true;
    }
}
