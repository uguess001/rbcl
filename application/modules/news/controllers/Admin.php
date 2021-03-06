<?php

class Admin extends Admin_Controller {

	

	function __construct()

	{

		parent::__construct();

		parent::index();

		$this->load->model('Mnews');

         $this->resource_path = realpath( APPPATH . '../uploads/news/' );

        $this->resource_path_url  = base_url() . 'uploads/news';

        $this->_image_config = array(

                        'allowed_types' => 'gif|png|jpeg|jpg|pdf|txt|docx',

                        'upload_path'   =>  $this->resource_path,

                        'max_size'      =>  90000000,

                        'max_width'     => 132000,

                        'max_height'    => 40000

            );

        $this->load->library('upload', $this->_image_config);

        $this->table_name ='news';

        $this->PageLimit = 10;

	}

    function index() {

        $this->record('list');

    }



    function record($cipher='null') { 

        $this->load->library('form_validation');

           

        if( $this->input->post('process') == 'true' )

        {   $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

            //Validating First Name Field

            $this->form_validation->set_rules('title_en', 'English Title', 'trim|required');
            $this->form_validation->set_rules('title_np', 'Nepali Title', 'trim|required');

            if ($this->form_validation->run() == FALSE) {}else{

            if(  $this->Mnews->Save() )

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'success',

                    '_message'  => 

                    intval($this->Encryption->decode($cipher))?

                    'Successfully updated.':'Successfully added.'

                    ));

                update_dop_user_log('has added '.$this->Mnews->table_name); 

            }

            else

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'error',

                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'

                    ));

            }

            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Mnews->table_name, 'refresh'):

            redirect('admin/'.$this->Mnews->table_name.'/record/list', 'refresh');

            exit();

        }

    }

        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {					

            $data_content   =  array(

                'page_header'   => 'Add/Save records',

                'record'        => $this->Mnews->PickRecord($cipher)

                );

            $this->template->write_view('content', 'admin/form', $data_content, TRUE);

            $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');

            $this->template->render();

        }

        elseif(isset($cipher) && $cipher=="list") {

            $data=array(

                           'records'     => $this->Mnews->PickRecord()

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

    $record = $this->Mnews->get(intval($id));

    $this->db->where('id', $id);

    $this->db->delete('news'); 

    $this->delete_file($this->resource_path . '/' . $record->image);

    $this->delete_file($this->resource_path . '/' . $record->file);

    $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'success',

                    '_message'  => 'Successfully Deleted.'

                    ));

    redirect('admin/news/', 'refresh');


   }



   function delete_file($fullpath)

        {

                if(file_exists($fullpath))

                {

                        @unlink($fullpath);

                }

        }



   function delete_news_file(){
    $record=$this->Mnews->get(intval($this->input->post('file_id')));
    $this->delete_file($this->resource_path . '/' . $record->file);
           if($this->db->query("update news set file=null where id = '".$this->input->post('file_id')."'"))           
        {
        if($this->delete_file($this->resource_path . '/' . $this->input->post('file_id'))) {
            $return['status'] = 'success';
            }
            else
            {
            $return['status'] = 'fail';
            }
            }
            else
            {
            $return['status'] = 'fail';
}
echo json_encode($return);
exit;
}



}