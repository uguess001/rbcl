<?php

class Gallery extends NQF_Controller {

function __construct() {
	parent::__construct();
	$this->load->model('Mgallery');
	$this->load->helper('xml');
	$this->load->library('encryption');

	}





	function index(){
		$gallery = $this->Mgallery->GetList();
		$data = array(
			'list' => $this->Mgallery->GetList()
			);

		$this->template->write_view('content_left', 'index', $data, TRUE);
		$this->template->render();

	}







	function GetDetails($id){
		$id=$this->Encryption->decode($id);
		$data = array(
			'list' => $this->Mgallery->GetDetails($id),
			'albumname'=>$this->Mgallery->GetAlbum($id)
		  );

		$this->template->write_view('content_left', 'details', $data, TRUE);
		$this->template->render();
	}


}

