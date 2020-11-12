<?php
class Admin extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		parent::index();
		$this->load->model('Mpages');
        $this->resource_path = realpath( APPPATH . '../uploads/pages/' );
        $this->resource_path_url  = base_url() . 'uploads/pages/';
        $this->_image_config = array(
                        'allowed_types' => 'pdf|doc|docx|txt|xls|xlsx|zip|rar|gif|png|jpeg|jpg',
                        'upload_path'   =>  $this->resource_path,
                        'max_size'      =>  90000000,
                        'max_width'     => 132000,
                        'max_height'    => 40000
            );
        $this->load->library('upload', $this->_image_config);
        $this->table_name ='pages';
        $this->PageLimit = 10;
	}
    function index() {
        $this->record('list');
    }

    function record($cipher='null') { 
        if( $this->input->post('process') == 'true' )
        {  
            
            if(  $this->Mpages->Save() )
            {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 
                    intval($this->Encryption->decode($cipher))?
                    'Successfully updated.':'Successfully added.'
                    ));
                update_dop_user_log('has added '.$this->Mpages->table_name); 
            }
            else
            {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                    ));
            }
            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Mpages->table_name, 'refresh'):
            redirect('admin/'.$this->Mpages->table_name.'/record/list', 'refresh');
            
            exit();
        }
        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {					
            $data_content   =  array(
                'page_header'   => 'Add/Save records',
                'record'        => $this->Mpages->PickRecord($cipher)
                );
            $this->template->write_view('content', 'admin/form', $data_content, TRUE);
            // $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="list") {
            $data=array(
                           'records'     => $this->Mpages->PickRecord()
            );
        $this->template->write_view('content', 'admin/report', $data, TRUE);
        $this->template->render();
        }                  
        elseif(isset($cipher) && $cipher=="create") 
        {  
          $data_content = null;
          $this->template->write_view('content', 'admin/form', $data_content, TRUE);
        //   $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');
          $this->template->render();
        }
        else{
            redirect(base_url().'admin','refresh');
        }
  }
}