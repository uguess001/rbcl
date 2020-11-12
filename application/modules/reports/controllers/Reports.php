<?php

class Reports extends NQF_Controller {

function __construct() { 

	parent::__construct(); 

	$this->load->model('Mfrontreports');

	$this->load->helper('xml');

	$this->load->library('encryption');

	$this->PageLimit = 12;

	}

	function getListByFiscalYear($fiscal_year=NULL){
		$lang = $this->cur_lang;
		if(isset($fiscal_year)){

		$sql= "SELECT R.id,R.fiscal_year,R.file,R.status,R.CreatedOn,R.title_$lang as title, R.description_$lang as description,
                             R.status,R.slug,F.year,F.id as fis_id
                            from reports as R 
                            INNER join fiscal_year as F
                            ON F.id = R.fiscal_year
                            where R.status='1' AND R.fiscal_year = $fiscal_year 
                            ORDER BY R.id desc";
 		 // return $this->db->query($sql)->result();
 		 // return $this->db->query($sql)->result();
                            echo json_encode($this->db->query($sql)->result());
		}else{
			return '-';
		}
 
	}



	function index(){

		// print_r(json_decode($this->getListByFiscalYear()));
		

		$Offset=($this->uri->segment(3) && intval($this->uri->segment(3)))?($this->uri->segment(3)):0;
         $result['data'] = $this->Mfrontreports->GetAdminList($Offset,$this->PageLimit);
         // $result['content'] = $this->getListByFiscalYear(); //for outputting list of data acc to fiscal year
         $result['content'] = $this->Mfrontreports->GetAdminListByFiscalYear($Offset,$this->PageLimit); //for outputting list of data acc to fiscal year
         $result['pagination'] =  NULL;
         $result['pagination'] =  paginate($total_rows=$this->Mfrontreports->TotalRows,$base_url=base_url()."reports/index/",$this->PageLimit);

		$data = array(

					'list' =>  $result['data'],
					'content' =>  $result['content'],
					'pages'       => $result['pagination'],
                    'offset'      => $Offset

					);

		//print_r($data);exit();

		$this->template->write_view('content_left', 'index', $data, TRUE);

		$this->template->render();

	

	}

	

		function GetDetails($id){
		//$id=$this->Encryption->decode($id);
		$data = array(

					'list' => $this->Mfrontreports->GetDetails($id)

					);

		$this->template->write_view('content_left', 'details', $data, TRUE);

		$this->template->render();

	}





	

	

}

