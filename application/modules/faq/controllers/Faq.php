<?php
class Faq extends NQF_Controller {
function __construct() { 
	parent::__construct(); 
	$this->load->model('Mfrontfaq');
	$this->load->helper('xml');
	$this->load->library('encryption');
	}


	function index(){
		$data = array(
					'list' => $this->Mfrontfaq->GetList()
					);
		$this->template->write_view('content_left', 'index', $data, TRUE);
		$this->template->render();
	
	}

	
	
}
