<?php

class News extends NQF_Controller {

function __construct() { 

	parent::__construct(); 

	$this->load->model('Mfrontnews');

	$this->load->helper('xml');

	$this->load->library('encryption');

	$this->PageLimit = 20;

	}





	function index(){
		 $Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(3)):0;
         $result['data'] = $this->Mfrontnews->GetAdminList($Offset,$this->PageLimit);
         $result['pagination'] =  NULL;
         $result['pagination'] =  paginate($total_rows=$this->Mfrontnews->TotalRows,$base_url=base_url()."news/index/",$this->PageLimit);


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

					'list' => $this->Mfrontnews->GetDetails($id)

					);

		$this->template->write_view('content_left', 'details', $data, TRUE);

		$this->template->render();

	}


	//Retreiving the data of the news marquee from the model
	function latestNews(){
		 $Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(3)):0;
         $result['data'] = $this->Mfrontnews->getLatestNewsAndNotice($Offset,$this->PageLimit);
         $result['pagination'] =  NULL;
         $result['pagination'] =  paginate($total_rows=$this->Mfrontnews->TotalRows,$base_url=base_url()."news/latest/",$this->PageLimit);


		$data = array(

					'list' =>  $result['data'],
					'pages'       => $result['pagination'],
                    'offset'      => $Offset
                           

					);

		$this->template->write_view('content_left', 'latest-news', $data, TRUE);

		$this->template->render();

	}

	function latestNewsDetails($id){
		//$id=$this->Encryption->decode($id);
		$data = array(

					'list' => $this->Mfrontnews->getLatestNewsAndNoticeDetail($id)

					);

		$this->template->write_view('content_left', 'latest-details', $data, TRUE);

		$this->template->render();

	}
	

	

}

