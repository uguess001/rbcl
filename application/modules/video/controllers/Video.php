<?php

class Video extends NQF_Controller {

function __construct() { 

	parent::__construct(); 

	$this->load->model('Mfrontvideo');

	$this->load->helper('xml');

	$this->load->library('encryption');

	}





	function index(){

		$services = $this->Mfrontvideo->GetList();

		$data = array(

					'list' => $this->Mfrontvideo->GetList()

					);

		$this->template->write_view('content_left', 'index', $data, TRUE);

		$this->template->render();

	

	}



	

	

}

