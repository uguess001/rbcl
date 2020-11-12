<?php
class Services extends NQF_Controller {
	function __construct() {
	parent::__construct();
	$this->load->model('Mfrontservices');
	}

	function index(){
		redirect( base_url());
	}

	function getDetails($id){
		$detail =  $this->Mfrontservices->getDetails($id);
		if(!empty($detail)){
			$data = array(
				'list' => $detail,
			);
			$this->template->write_view('content_left', 'details', $data, TRUE);
			$this->template->render();
		}else{
			$this->load->view('pagenotfound');
		}
	}
}