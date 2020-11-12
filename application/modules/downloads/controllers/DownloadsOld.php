<?php

class Downloads extends NQF_Controller {

function __construct() { 

	parent::__construct(); 

	$this->load->model('Mfrontdownloads');


	$this->load->model('downloadscategory/Mfrontdownloads');

	$this->load->helper('xml');

	$this->load->library('encryption');

	$this->PageLimit = 12;

	}





	function index(){
		 $Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(2)+1):0;
         $result['data'] = $this->Mfrontdownloads->GetAdminList($Offset,$this->PageLimit);
         $result['pagination'] =  NULL;
         $result['pagination'] =  paginate($total_rows=$this->Mfrontdownloads->TotalRows,$base_url=base_url()."downloads/index/",$this->PageLimit);

		$data = array(

					'list' =>  $result['data'],
					'pages'       => $result['pagination'],
                    'offset'      => $Offset

					);

		$this->template->write_view('content_left', 'index', $data, TRUE);

		$this->template->render();

	

	}

    


	function GetDetails($id){
		$id=$this->Encryption->decode($id);
		$data = array(

					'list' => $this->Mfrontdownloads->GetDetails($id)

					);

		$this->template->write_view('content_left', 'details', $data, TRUE);

		$this->template->render();

	}

	function Documents($cat_id){
		 $Offset=($this->uri->segment(4) && intval($this->uri->segment(4)))?($this->uri->segment(4)):0;
         $result['data'] = $this->Mfrontdownloads->GetAdminDocumentsList($Offset,$this->PageLimit,$cat_id);
         $result['pagination'] =  NULL;
         $result['pagination'] =  paginate($total_rows=$this->Mfrontdownloads->TotalRows,$base_url=base_url()."downloads/documents/".$cat_id."/",$this->PageLimit);

// print_r($result['data']);

		$data = array(

					'list' =>  $result['data'],
					'pages'       => $result['pagination'],
                    'offset'      => $Offset

					);

		$this->template->write_view('content_left', 'index', $data, TRUE);

		$this->template->render();

	

	}

    


	function GetDocumentsDetails($id){
		$id=$this->Encryption->decode($id);
		$data = array(

					'list' => $this->Mfrontdownloads->GetDocumentsDetails($id)

					);

		$this->template->write_view('content_left', 'details', $data, TRUE);

		$this->template->render();

	}

	function Circulars(){
		 $Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(3)):0;
         $result['data'] = $this->Mfrontdownloads->GetCircularsList($Offset,$this->PageLimit);
         $result['pagination'] =  NULL;
         $result['pagination'] =  paginate($total_rows=$this->Mfrontdownloads->TotalRows,$base_url=base_url()."downloads/circulars/",$this->PageLimit);

		$data = array(

					'list' =>  $result['data'],
					'pages'       => $result['pagination'],
                    'offset'      => $Offset

					);

		$this->template->write_view('content_left', 'index', $data, TRUE);

		$this->template->render();

	

	}

    


	function GetCircularsDetails($id){
		$id=$this->Encryption->decode($id);
		$data = array(

					'list' => $this->Mfrontdownloads->GetCircularsDetails($id)

					);

		$this->template->write_view('content_left', 'details', $data, TRUE);

		$this->template->render();

	}

	function Bulletins(){
		 $Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(3)):0;
         $result['data'] = $this->Mfrontdownloads->GetBulletinsList($Offset,$this->PageLimit);
         $result['pagination'] =  NULL;
         $result['pagination'] =  paginate($total_rows=$this->Mfrontdownloads->TotalRows,$base_url=base_url()."downloads/bulletins/",$this->PageLimit);

		$data = array(

					'list' =>  $result['data'],
					'pages'       => $result['pagination'],
                    'offset'      => $Offset

					);

		$this->template->write_view('content_left', 'index', $data, TRUE);

		$this->template->render();

	

	}

    


	function GetBulletinsDetails($id){
		$id=$this->Encryption->decode($id);
		$data = array(

					'list' => $this->Mfrontdownloads->GetBulletinsDetails($id)

					);

		$this->template->write_view('content_left', 'details', $data, TRUE);

		$this->template->render();

	}

	

}

