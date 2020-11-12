<?php
class Staffs extends NQF_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Mfrontstaffs');
		$this->load->model('Mstaffs');
		$this->load->helper('xml');
		$this->load->library('encryption');
	}

	function index(){
		$staffs = $this->Mfrontstaffs->GetList();
		$data = array(
			'list' => $this->Mfrontstaffs->GetList()
		);
		$this->template->write_view('content_left', 'index', $data, TRUE);
		$this->template->render();	
	}	
	function staffDetails($id){
		$lang = $this->cur_lang;
		$staffs = $this->Mstaffs->staffdetail($id);

		$data = array(
			'list' => $staffs,
			'lang' => $lang
		);
		
		$this->template->write_view('content_left', 'staffdetails', $data, TRUE);
		$this->template->render();	
	}	
	
}