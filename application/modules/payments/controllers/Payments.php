<?php
class Payments extends NQF_Controller {
	function __construct() {
	parent::__construct();
	$this->load->model('Mfrontpayment');
	}

	function index(){
		redirect( base_url());
	}

	function GetDetails($id){
		$list = $this->Mfrontpayment->GetList();
		$detail =  $this->Mfrontpayment->getDetails($id);
		if(!empty($list)){
			$data = array(
				'list'	=> $list,
				'content' => $detail,
			);
			$this->template->write_view('content_left', 'details', $data, TRUE);
			$this->template->render();
		}else{
			$this->load->view('pagenotfound');
		}
	}

	public function GetPaymentList(){
		$list = $this->Mfrontpayment->GetList();

		if(!empty($list)){
			$data = array(
				'list'	=> $list,
			);
			$this->template->write_view('content_left', 'index', $data, TRUE);
			$this->template->render();
		}
	}
}