<?php

class Admin extends Admin_Controller {

  

  function __construct()

  {

    parent::__construct();

    parent::index();

    $this->load->model('Mcallrequest');

        $this->table_name ='tbl_callback_request';

        $this->PageLimit = 10;

  }




    function index() {

        $this->record('list');

    }



    function record($cipher='null') { 


        if(isset($cipher) && $cipher=="list") {

            $data=array(

                           'records'     => $this->Mcallrequest->PickRecord()

            );

        $this->template->write_view('content', 'admin/callrequest', $data, TRUE);

        $this->template->render();

        }                  


        else{

            redirect(base_url().'admin','refresh');

        }

  }

  function contact() { 

            $data=array(

                 'records'     => $this->Mcallrequest->getContactInformation(),

            );

        $this->template->write_view('content', 'admin/contact', $data, TRUE);

        $this->template->render();

  }

}