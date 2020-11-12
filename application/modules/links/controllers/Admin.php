<?php
class Admin extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		parent::index();
		$this->load->model('Mlinks');
         $this->resource_path = realpath( APPPATH . '../uploads/links/' );
        $this->resource_path_url  = base_url() . 'uploads/links/';
        $this->_image_config = array(
                        'allowed_types' => 'gif|png|jpeg|jpg',
                        'upload_path'   =>  $this->resource_path,
                        'max_size'      =>  90000000,
                        'max_width'     => 132000,
                        'max_height'    => 40000
            );
        $this->load->library('upload', $this->_image_config);
        $this->table_name ='links';
        $this->PageLimit = 10;
	}





function compose_email(){
        if(!empty($_POST) && $_POST['process']==TRUE){

            $email_to_send=$this->input->post('email_to_send');
            if(array_count_values($email_to_send)>1){
                   $email_to_send=implode(',', $email_to_send); 
            }


            $messages=$this->input->post('messages');

            $this->load->library('email');

            $config['protocol'] = "smtp";

                
            
            //RBCL SMTP
            $config['smtp_host'] = "mail.rbcl.com.np";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = "info@rbcl.com.np"; 
            $config['smtp_pass'] = "Company123";
            
            
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

            $this->email->initialize($config);


            $this->email->from('info@rbcl.com.np', 'RBCL');
            $this->email->to($email_to_send);
            $this->email->subject('New Email');
            $this->email->message($messages);

            //Send mail
            if($this->email->send())
                $this->session->set_flashdata("email_sent","The E-mail has been sent successfully.");
            else
                $this->session->set_flashdata("email_sent","You have encountered an error in SMTP account.!!");

        }


    $data = array(

    );
$this->template->write_view('content', 'admin/compose_email',$data);
$this->template->render();
}







    function index() {
        $this->record('list');
    }

    function record($cipher='null') { 
        $this->load->library('form_validation');

        if( $this->input->post('process') == 'true' )
        {  
            $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
            //Validating First Name Field
            $this->form_validation->set_rules('title_en', 'title_en', 'trim|required');
            if ($this->form_validation->run() == FALSE) {}else{
            if(  $this->Mlinks->Save() )
            {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 
                    intval($this->Encryption->decode($cipher))?
                    'Successfully updated.':'Successfully added.'
                    ));
                update_dop_user_log('has added '.$this->Mlinks->table_name); 
            }
            else
            {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                    ));
            }
            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Mlinks->table_name, 'refresh'):
            redirect('admin/'.$this->Mlinks->table_name.'/record/list', 'refresh');
            exit();
        }
        }
        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {					
            $data_content   =  array(
                'page_header'   => 'Add/Save records',
                'record'        => $this->Mlinks->PickRecord($cipher)
                );
            $this->template->write_view('content', 'admin/form', $data_content, TRUE);
            $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="list") {
            $data=array(
                           'records'     => $this->Mlinks->PickRecord()
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
    $this->db->delete('links'); 
    $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 'Successfully Deleted.'
                    ));
    redirect('admin/links/', 'refresh');
   }
}