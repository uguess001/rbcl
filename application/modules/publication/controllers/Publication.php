<?php

class Publication extends NQF_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mfrontpublication');
		$this->load->helper('xml');
		$this->load->library('encryption');
		$this->PageLimit = 10;
	}

	function index(){

		$Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(3)):0;
		$result['data'] = $this->Mfrontpublication->GetAdminList($Offset,$this->PageLimit);
		$result['pagination'] =  NULL;
		$result['pagination'] =  paginate($total_rows=$this->Mfrontpublication->TotalRows,$base_url=base_url()."publication/index/",$this->PageLimit);

		$data = array(
			'list' 			=> $result['data'],
			'pages'       	=> $result['pagination'],
            'offset'      	=> $Offset
		);

		$this->template->write_view('content_left', 'index', $data, TRUE);
		$this->template->render();
	}

	function GetDetails($id){
//		$id=$this->Encryption->decode($id);
		 $data = array(
			'list' 		=> $this->Mfrontpublication->GetDetails($id)
		);

		$this->template->write_view('content_left', 'details', $data, TRUE);
		$this->template->render();
	}


}

