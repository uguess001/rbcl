<?php

class Admin extends Admin_Controller {

	

	function __construct()

	{

		parent::__construct();

		parent::index();

		$this->load->model('Mcareer');

         $this->resource_path = realpath( APPPATH . '../uploads/career/' );

        $this->resource_path_url  = base_url() . 'uploads/career/';

        $this->_image_config = array(

                        'allowed_types' => 'gif|png|jpeg|jpg|pdf|txt|docx',

                        'upload_path'   =>  $this->resource_path,

                        'max_size'      =>  90000000,

                        'max_width'     => 132000,

                        'max_height'    => 40000

            );

        $this->load->library('upload', $this->_image_config);

        $this->table_name ='career';

        $this->PageLimit = 10;

	}

    function getFiscalYearData(){
        $query = $this->db->query("select * from fiscal_year where 1=1");
        return $query->result();

    }

    function index() {

        $this->record('list');

    }



    function record($cipher='null') { 

        $this->load->library('form_validation');



        if( $this->input->post('process') == 'true' )

        {  

            $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

            $this->form_validation->set_rules('title_en', 'English Title', 'trim|required');
            $this->form_validation->set_rules('title_np', 'Neplai Title', 'trim|required');

            if ($this->form_validation->run() == FALSE) {}else{

            if(  $this->Mcareer->Save() )

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'success',

                    '_message'  => 

                    intval($this->Encryption->decode($cipher))?

                    'Successfully updated.':'Successfully added.'

                    ));

                update_dop_user_log('has added '.$this->Mcareer->table_name); 

            }

            else

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'error',

                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'

                    ));

            }

            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Mcareer->table_name, 'refresh'):

            redirect('admin/'.$this->Mcareer->table_name.'/record/list', 'refresh');

            exit();

        }

        }

        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {					

            $data_content   =  array(

                'page_header'   => 'Add/Save records',

                'record'        => $this->Mcareer->PickRecord($cipher),

                );

            $this->template->write_view('content', 'admin/form', $data_content, TRUE);

            $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');

            $this->template->render();

        }

        elseif(isset($cipher) && $cipher=="list") {

            $data=array(

                   'records'     => $this->Mcareer->PickRecord(),

            );



        $this->template->write_view('content', 'admin/report', $data, TRUE);

        $this->template->render();

        }                  

        elseif(isset($cipher) && $cipher=="create") 

        {  

          $data=array(
                    'blank_data'    => null,

            );

          $this->template->write_view('content', 'admin/form', $data, TRUE);

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

    $this->db->delete('career'); 
    $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 'Successfully Deleted.'
                    ));
    redirect('admin/career/', 'refresh');

   }

   function delete_file($fullpath)

        {

                if(file_exists($fullpath))

                {

                        @unlink($fullpath);

                }

        }





   function delete_career_file(){

    $record=$this->Mcareer->get(intval($this->input->post('file_id')));

    $this->delete_file($this->resource_path . '/' . $record->file);

           if($this->db->query("update career set file=null where id = '".$this->input->post('file_id')."'"))               

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