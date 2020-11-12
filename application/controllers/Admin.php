<?php
class Admin extends Admin_Controller {
	function __construct() {
    	parent::__construct();    
	}
	function index()
	{
                parent::index();                
                $data = array();
				$this->template->write_view('content', 'templates/admin/partials/home',$data);
				$this->template->write_view('scripts', 'templates/admin/partials/scripts',$data,TRUE);	
                $this->template->render();
	}
}