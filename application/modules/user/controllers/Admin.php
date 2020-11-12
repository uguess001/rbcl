<?php
class Admin extends Admin_Controller {
    function __construct()
    {
        parent::__construct();
        parent::index();
        $this->load->model('Muser');
        $this->load->model('usertype/Musertype');
    }
    function index() {
        $this->record('list');
    }
    function GetView(){
        $this->template->write_view('content','admin/Sample');
        $this->template->render();
    }
    function record($cipher='null') {
        if( $this->input->post('process') == 'true' )
        {
            if($this->Muser->CheckDuplicate() && $this->Muser->Save())
            {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  =>
                    intval($this->Encryption->decode($cipher))?
                    'Successfully updated.':'Successfully added.'
                    ));
                update_dop_user_log('has added '.$this->Muser->table_name);
                  redirect('admin/'.$this->Muser->table_name.'/record/list', 'refresh');
            exit();
            }
            else
            {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                    ));
            echo "<script>alert('Duplicate exists.');</script>";
            redirect('admin/'.$this->Muser->table_name.'/record/create', 'refresh');
            exit();
            }
            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Muser->table_name.'/record/'.$cipher, 'refresh'):
            redirect('admin/'.$this->Muser->table_name.'/record/list', 'refresh');
            exit();
        }
        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {
            $data_content   =  array(
                'page_header'   => 'Add/Save records',
                'record'        => $this->Muser->PickRecord($cipher),
                'usertype'    =>$this->Musertype->PickRecord(),
            );
            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="list") {
            $data=array(
                           'records'     => $this->Muser->PickRecord(),
                           'usertype'    =>$this->Musertype->PickRecord(),
                          // 'status'      =>$this->Mstatus->PickRecord()
            );
        $this->template->write_view('content', 'admin/report', $data, TRUE);
        $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="create") {
         $data_content   =  array(
                           'usertype'    =>$this->Musertype->PickRecord(),
                           //'status'      =>$this->Mstatus->PickRecord(),
                );
          $this->template->write_view('content', 'admin/form', $data_content, TRUE);
          $this->template->render();
        }
        else{
            redirect(base_url().'admin','refresh');
        }
  }
    function delete($id){
    $id=$this->Encryption->decode($id);
    $record = $this->Muser->get(intval($id));
    $this->db->where('UserId', $id);
    $this->db->delete('user');
    $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 'Successfully Deleted.'
                    ));
    redirect('admin/user/', 'refresh');
   }
}