<?php
class Weensure extends NQF_Controller {
	function __construct() {
	parent::__construct();
	$this->load->model('Mfrontweensure');
	}

	function index(){
		redirect( base_url());
	}

	function GetDetails($id){
		$detail =  $this->Mfrontweensure->getDetails($id);
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