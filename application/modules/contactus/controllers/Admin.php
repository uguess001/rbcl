<?php
class Admin extends Admin_Controller {

    function __construct(){
        parent::__construct();
        parent::index();
        $this->load->model('Mcontactus');
    }

    function index() {
        $this->record('list');
    }

    function record($cipher='null',$id=null) {
        if($this->input->post('process') == 'true'){
            if($this->Mcontactus->Save()){
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  =>
                    intval($this->Encryption->decode($cipher))?
                    'Successfully updated.':'Successfully added.'
                ));
                update_dop_user_log('has added '.$this->Mcontactus->table_name);
            }
            else{
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                ));
            }
            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Mcontactus->table_name, 'refresh'):
            redirect('admin/'.$this->Mcontactus->table_name.'/record/list', 'refresh');
            exit();
        }
        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {
            $data_content   =  array(
                'page_header'       => 'Add/Save records',
                'record'            => $this->Mcontactus->PickRecord($cipher),
                'branchtypelist'    => $this->Mcontactus->getBranchTypeList()
            );
            $this->template->write_view('content', 'admin/form', $data_content, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="list") {
            $data=array(
                'records'     => $this->Mcontactus->getContactList()
            );
            $this->template->write_view('content', 'admin/report', $data, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="create"){
            $data_content   =  array(
                'page_header'       => 'Add/Save records',
                'branchtypelist'    => $this->Mcontactus->getBranchTypeList()
            );
            $this->template->write_view('content', 'admin/form', $data_content, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="delete"){
            $id = $this->Encryption->decode($id);
            $this->db->where('id', $id)->delete('contactus');
            $this->session->set_flashdata('_flash_msg', array(
                '_css_cls'  => 'success',
                '_message'  => 'Successfully Deleted'
            ));
            redirect(base_url().'admin/contactus','refresh');
        }
        else{
            redirect(base_url().'admin','refresh');
        }
    }

    function GetCallback(){
        $data = array(
            'records'=>$this->Mcontactus->GetCallback()
        );
        $this->template->write_view('content', 'admin/callback', $data, TRUE);
        $this->template->render();
    }

    function deteleCallback($id){
        $id = $this->Encryption->decode($id);
        $this->db->where('id', $id);
        $this->db->delete('callback');
        redirect('admin/contactus/GetCallback/', 'refresh');
    }
}