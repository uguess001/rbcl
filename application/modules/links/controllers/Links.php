<?php

class Links extends NQF_Controller {

function __construct() { 

	parent::__construct(); 

	$this->load->model('Mfrontlinks');

	$this->load->helper('xml');

	$this->load->library('encryption');

	$this->PageLimit = 5;

	}


function index(){
	redirect(base_url());
}


	// function index(){
	// 	$Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(2)+1):0;
 //         $result['data'] = $this->Mfrontlinks->GetAdminList($Offset,$this->PageLimit);
 //         $result['pagination'] =  NULL;
 //         $result['pagination'] =  paginate($total_rows=$this->Mfrontlinks->TotalRows,$base_url=base_url()."reports/index/",$this->PageLimit);

	// 	$data = array(

	// 				'list' =>  $result['data'],
	// 				'pages'       => $result['pagination'],
 //                    'offset'      => $Offset

	// 				);

	// 	//print_r($data);exit();

	// 	$this->template->write_view('content_left', 'index', $data, TRUE);

	// 	$this->template->render();

	

	// }

	

		function GetDetails($id){

		$data = array(

					'list' => $this->Mfrontlinks->GetDetails($id)

					);

		$this->template->write_view('content_left', 'details', $data, TRUE);

		$this->template->render();

	}





	

	

}

