<?php

class Tender extends NQF_Controller {

function __construct() { 

	parent::__construct(); 

	$this->load->model('Mfronttender');

	$this->load->helper('xml');

	$this->load->library('encryption');

	$this->PageLimit = 10;

	}





	function index(){
		 $Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(3)):0;
         $result['data'] = $this->Mfronttender->GetAdminList($Offset,$this->PageLimit);
         $result['pagination'] =  NULL;
         $result['pagination'] =  paginate($total_rows=$this->Mfronttender->TotalRows,$base_url=base_url()."tender/index/",$this->PageLimit);


		$data = array(

					'list' =>  $result['data'],
					'pages'       => $result['pagination'],
                    'offset'      => $Offset
                           

					);
		

		$this->template->write_view('content_left', 'index', $data, TRUE);

		$this->template->render();

	

	}

	

	

	function GetDetails($id){
		//$id=$this->Encryption->decode($id);
		$data = array(

					'list' => $this->Mfronttender->GetDetails($id)

					);

		$this->template->write_view('content_left', 'details', $data, TRUE);

		$this->template->render();

	}



	

	

}

