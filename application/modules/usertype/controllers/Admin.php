<?php
class Admin extends Admin_Controller {
    
    function __construct()
    {
        parent::__construct();
        parent::index();
        $this->load->model('Musertype');
        // $this->load->model('menu/Mmenu');
        $this->load->model('usertyperoles/Musertyperoles');
        $this->table_name ='usertype';
        $this->PageLimit = 10;

    }
    function index() {
        $this->record('list');
    }

    function record($cipher='null', $id='null') {

        if( $this->input->post('process') == 'true' ) {  
            $val = 0;
            if( 1) {
                // print_r($_POST);
                // die;
                if($_POST[$this->Musertype->primary_key]>0) {
                    $this->Musertyperoles->primary_key =$_POST[$this->Musertype->primary_key];
                    $this->Musertype->Save();
                }
                else {
                    $val = $this->Musertype->Save();  
                     $this->Musertyperoles->primary_key_val = $val;                   
                }
                if( empty($cipher)) {
                    $this->Musertyperoles->Save(); 
                }
                else {
                 $this->Musertyperoles->primary_key = "UserTypeId";
                 $this->Musertyperoles->Save();
                }

                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 
                    intval($this->Encryption->decode($cipher))?
                    'Successfully updated.':'Successfully added.'
                    ));
                update_dop_user_log('has added '.$this->Musertype->table_name); 
            }
            else {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                    ));
            }
            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Musertype->table_name.'/record/'.$cipher, 'refresh'):
            redirect('admin/'.$this->Musertype->table_name.'/record/list', 'refresh');
            exit();
        }
        if(isset($cipher) && is_numeric($this->Encryption->decode($cipher)) ) {
            $this->Musertyperoles->primary_key = 'UserTypeID';
            $id = $this->Encryption->decode($cipher);
            $record = $this->Musertype->PickRecord($id);
            // pe($record);
            $data_content   =  array(
                    'page_header'       => 'Add/Save records',
                    'record'            => $record,
                    //'description'       => $this->Musertype->GetuserDescription($record->UserTypeID),
                    'menu'              => $this->Musertype->GetMenu(),
                    'menuHeading'       => $this->Musertype->GetMenuHeading(),
                    'roles'             => $this->Musertyperoles->PickRecord($id)
                );
            // pe($data_content);

            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
            $this->template->render();
        }

        elseif(isset($cipher) && $cipher=="list") {
            $Offset=($this->uri->segment(5) && intval($this->uri->segment(5)))?($this->uri->segment(5)+0):0;
            $result['data'] = $this->Musertype->GetAdminList($Offset,$this->PageLimit);
            $result['pagination'] =  NULL;
            $result['pagination'] =  paginate($total_rows=$this->Musertype->TotalRows,$base_url=base_url()."admin/".$this->table_name."/record/list/",$this->PageLimit);
            $data=array(
                           'list'           => $result['data'],
                           'pages'          => $result['pagination'],
                           'page_header'    => 'List of User Type',
                           'offset'         => $Offset
            );
            $this->template->write_view('content', 'admin/report', $data, TRUE);
            $this->template->render();
        }                  
        elseif(isset($cipher) && $cipher=="create") {  
          $data_content = null;
          $data_content   =  array(
                'usertype'          => $this->Musertype->PickRecord(),
                'menu'              => $this->Musertype->GetMenu(),
                'menuHeading'       => $this->Musertype->GetMenuHeading(),
                'roles'             => array()
                           
                );
          $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
          $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="deactivate" && isset($id)) {
            $id = $this->Encryption->decode($id);            
            $this->deactivate($id);
            redirect('admin/'.$this->table_name.'/record/list', 'refresh');
        }
        else{
            redirect(base_url().'admin','refresh');
        }        
    }

    function deactivate($id) {

        $data_content   =  array(
                'page_header'   => 'Delete Records',
                'record'        => $this->Musertype->Deactivate($id)
                );
        return true;
    }

}