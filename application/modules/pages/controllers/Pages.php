<?php

class Pages extends NQF_Controller {

function __construct() { 

	parent::__construct(); 

	$this->load->model('Mfrontpages');

	$this->load->helper('xml');

	$this->load->library('encryption');

	}





	function index(){

	redirect( base_url());

	}



	function GetDetails($uri){

		$uri=($uri);

		$data = array(

					'list' => $this->Mfrontpages->GetDetails($uri)

					);

		$this->template->write_view('content_left', 'index', $data, TRUE);

		$this->template->render();

	}

	// function search(){ 	
	// 		$data['query'] = $this->Mfrontpages->search_pages();
	// 		$data['num_rows_result'] = $this->Mfrontpages->search_pages();
	// 		//$data['news']=$this->Mfrontnews->search_news();
	// 		$this->template->write_view('content_left', 'search_list', $data, TRUE);
	// 		$this->template->render();	
	// 	}

	function search(){
		 $lang = $this->cur_lang;

        $services = "select id,image,title_$lang as title, description_$lang as description,slug from services where status='1'" ;

        $news = "select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description,slug from news where status='1'";

      //  $pages = "select id,image,title_$lang as title,uri,description_$lang as description from pages where status='1'";

        $reports = "select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status, slug from reports where status='1'";



     if(isset($_POST['search'])){
        $_SESSION['what'] = htmlspecialchars($_POST['search'], ENT_QUOTES) ;
     }    
        if(isset($_SESSION['what'])){
        $services .= ' AND title_en like "%'.$_SESSION['what'].'%" ';
        $news .= ' AND title_en like "%'.$_SESSION['what'].'%" ';
     //   $pages .= ' AND title_en like "%'.$_SESSION['what'].'%" ';
        $reports .= ' AND title_en like "%'.$_SESSION['what'].'%" ';
     }       
    

  $listservices  =   $this->db->query($services)->result();
  $listnews   =   $this->db->query($news)->result();
  //$listpages  =   $this->db->query($pages)->result();
  $listreports  =   $this->db->query($reports)->result();


//Configure href
  foreach ($listservices as $key => $value) {
    $value->href = base_url().'services/'.($value->slug);
  }  
  foreach ($listnews as $key => $value) {
    $value->href = base_url().'news/'.($value->slug);
  }  
  // foreach ($listpages as $key => $value) {
  //   $value->href = base_url().'page/'.($value->uri);
  // }  
  foreach ($listreports as $key => $value) {
    $value->href = base_url().'reports/'.($value->slug);
  }

    $data = array(
        'listservices' => $listservices,
        'listnews' => $listnews,
      //  'listpages' => $listpages,
        'listreports' => $listreports,
        'what' => $_SESSION['what'],
        'PageTitle' => 'Search Result'
    );  
$this->template->write_view('content_left', 'search_list', $data, TRUE);
 		$this->template->render();	

	}

}

