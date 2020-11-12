<?php

class Admin extends Admin_Controller {

	

	function __construct()

	{

		parent::__construct();

		parent::index();

		$this->load->model('Mfiscalyear');

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

            $this->form_validation->set_rules('year', 'Fiscal Year', 'required');

            if ($this->form_validation->run() == FALSE) {}else{

            if(  $this->Mfiscalyear->Save() )

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'success',

                    '_message'  => 

                    intval($this->Encryption->decode($cipher))?

                    'Successfully updated.':'Successfully added.'

                    ));

                update_dop_user_log('has added '.$this->Mfiscalyear->table_name); 

            }

            else

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'error',

                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'

                    ));

            }

            intval($this->Encryption->decode($cipher))?redirect('admin/fiscalyear', 'refresh'):

            redirect('admin/fiscalyear', 'refresh');

            exit();

        }

        }

        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {					

            $data_content   =  array(

                'page_header'   => 'Add/Save records',

                'record'        => $this->Mfiscalyear->PickRecord($cipher)

                );

            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);

            $this->template->render();

        }

        elseif(isset($cipher) && $cipher=="list") {

            $data=array(

                           'records'     => $this->Mfiscalyear->PickRecord()

            );

        $this->template->write_view('content', 'admin/index', $data, TRUE);

        $this->template->render();

        }                  

        elseif(isset($cipher) && $cipher=="create") 

        {  

          $data_content = null;

          $this->template->write_view('content', 'admin/edit', $data_content, TRUE);

          $this->template->render();

        }

        else{

            redirect(base_url().'admin','refresh');

        }

  }

  function delete($id){

    $id=$this->Encryption->decode($id);

    $this->db->where('id', $id);

    $this->db->delete('fiscal_year'); 
    $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 'Successfully Deleted.'
                    ));
    redirect('admin/fiscalyear/', 'refresh');

   }


}