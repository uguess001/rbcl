<?php
class Admin extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		parent::index();
		$this->load->model('Mvideo');
         $this->resource_path = realpath( APPPATH . '../uploads/services/' );
        $this->resource_path_url  = base_url() . 'uploads/services/';
        $this->_image_config = array(
                        'allowed_types' => 'gif|png|jpeg|jpg',
                        'upload_path'   =>  $this->resource_path,
                        'max_size'      =>  90000000,
                        'max_width'     => 132000,
                        'max_height'    => 40000
            );
        $this->load->library('upload', $this->_image_config);
        $this->table_name ='services';
        $this->PageLimit = 10;
	}
    function index() {
        $this->record('list');
    }

    function record($cipher='null') { 
        $this->load->library('form_validation');

        if( $this->input->post('process') == 'true' )
        {  
            $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
            //Validating Title  Field
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            //Validating URL  Field
            $this->form_validation->set_rules('url', 'url', 'trim|required');
            if ($this->form_validation->run() == FALSE) {}else{
            if(  $this->Mvideo->Save() )
            {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 
                    intval($this->Encryption->decode($cipher))?
                    'Successfully updated.':'Successfully added.'
                    ));
                update_dop_user_log('has added '.$this->Mvideo->table_name); 
            }
            else
            {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                    ));
            }
            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Mvideo->table_name, 'refresh'):
            redirect('admin/'.$this->Mvideo->table_name.'/record/list', 'refresh');
            exit();
        }
        }
        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {					
            $data_content   =  array(
                'page_header'   => 'Add/Save records',
                'record'        => $this->Mvideo->PickRecord($cipher)
                );
            $this->template->write_view('content', 'admin/form', $data_content, TRUE);
            $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="list") {
            $data=array(
                           'records'     => $this->Mvideo->PickRecord()
            );
        $this->template->write_view('content', 'admin/report', $data, TRUE);
        $this->template->render();
        }                  
        elseif(isset($cipher) && $cipher=="create") 
        {  
          $data_content = null;
          $this->template->write_view('content', 'admin/form', $data_content, TRUE);
          $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');
          $this->template->render();
        }
        else{
            redirect(base_url().'admin','refresh');
        }
  }
  function delete($id){
    $id=$this->Encryption->decode($id);
    $this->db->where('id', $id);
    $this->db->delete('video'); 
    redirect('admin/video/', 'refresh');
   }
}