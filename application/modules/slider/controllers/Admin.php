<?php

class Admin extends Admin_Controller {

	

	function __construct()

	{

		parent::__construct();

		parent::index();

		$this->load->model('Mslider');

        $this->resource_path = realpath( APPPATH . '../uploads/slider/' );

        $this->resource_path_url  = base_url() . 'uploads/slider/';

        $this->_image_config = array(

                        'allowed_types' => 'gif|png|jpeg|jpg',

                        'upload_path'   =>  $this->resource_path,

                        'max_size'      =>  90000000,

                        'max_width'     => 132000,

                        'max_height'    => 40000

            );

        $this->load->library('upload', $this->_image_config);

        $this->table_name ='slider';

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

            $this->form_validation->set_rules('title_en', 'title_en', 'trim|required');

            if ($this->form_validation->run() == FALSE) {}else{

            if(  $this->Mslider->Save() )

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'success',

                    '_message'  => 

                    intval($this->Encryption->decode($cipher))?

                    'Successfully updated.':'Successfully added.'

                    ));

                update_dop_user_log('has added '.$this->Mslider->table_name); 

            }

            else

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'error',

                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'

                    ));

            }

            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Mslider->table_name, 'refresh'):

            redirect('admin/'.$this->Mslider->table_name.'/record/list', 'refresh');

            exit();

        }

        }

        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {					

            $data_content   =  array(

                'page_header'   => 'Add/Save records',

                'record'        => $this->Mslider->PickRecord($cipher)

                );

            $this->template->write_view('content', 'admin/form', $data_content, TRUE);

            $this->template->render();

        }

        elseif(isset($cipher) && $cipher=="list") {

            $data=array(

                           'records'     => $this->Mslider->PickRecord()

            );

        $this->template->write_view('content', 'admin/report', $data, TRUE);

        $this->template->render();

        }                  

        elseif(isset($cipher) && $cipher=="create") 

        {  

          $data_content = null;

          $this->template->write_view('content', 'admin/form', $data_content, TRUE);

          $this->template->render();

        }

        else{

            redirect(base_url().'admin','refresh');

        }

  }

   function delete($id){

    $id=$this->Encryption->decode($id);

    $this->db->where('id', $id);

    $this->db->delete('slider'); 

    $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'success',

                    '_message'  => 'Successfully Deleted.'

                    ));

    redirect('admin/slider/', 'refresh');

   }
   function ajax_save_order() {
        $order = array();
        $message = '';
        $order = $this->input->post('order');
        $order = explode(',', $order);
//            print_r($order); exit();
        $i = 1;
        foreach ($order as $ord) {
            $data = array(
                'ordering' => $i
            );
            $this->db->update('slider', $data, "id = $ord");
            $i++;
        }
        if ($i > 1) {
            $message = 'Record Updated Successfully.';
        } else {
            $message = 'Error While Updating Record.';
        }
        echo json_encode($message);
        exit;
    }

    function groupHierarchy() {
         $group_data['group_list']=$this->db->query("select * from slider order by ordering")->result();
        $this->template->write_view('content', 'admin/groupHierarchyView', $group_data, TRUE);

        $this->template->render();
    } 

}