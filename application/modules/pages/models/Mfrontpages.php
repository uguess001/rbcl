<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mfrontpages extends MY_Model {

        function __construct() { 

            parent::__construct(); 

            

        }



        function GetDetails($id) {
            $lang = $this->cur_lang;
            //$id=$this->encrypt->decode($id);
    		 $sql="select id,image,title_$lang as title, description_$lang as description from pages where status='1' and slug='$id'";
    		$diff_array = $this->db->query($sql)->result();

    		$page_data = count($diff_array) > 0 ? $diff_array[0] : array();

            return $page_data;

        }  

        // function search_pages()
        // {
                          
        //     $match = $this->input->post('search');
        //    // $match = 'ceo';
        //     $this->db->like('page_title_en',$match);
        //     $this->db->or_like('description_en',$match);
        //     $query = $this->db->get('pages');
        //     //print'<pre>';print_r($query->result());exit;  
        //     return $query->result();
        // }

        function search_pages()
        {
        $lang = $this->cur_lang;

        $services = "select id,image,title_$lang as title, description_$lang as description,slug from services where status='1'" ;

        $news = "select id,image,CreatedOn,file,status,title_$lang as title, description_$lang as description,slug from news where status='1'";

        $pages = "select id,image,page_title_$lang as title, description_$lang as description from pages where status='1'";

        $reports = "select id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status, slug from reports where status='1'";



     if(isset($_POST['search'])){
        $_SESSION['what'] = htmlspecialchars($_POST['search'], ENT_QUOTES) ;
     }    
        if(isset($_SESSION['what'])){
        $services .= ' AND title_en like "%'.$_SESSION['what'].'%" ';
        $news .= ' AND title_en like "%'.$_SESSION['what'].'%" ';
        $pages .= ' AND page_title_en like "%'.$_SESSION['what'].'%" ';
        $reports .= ' AND title_en like "%'.$_SESSION['what'].'%" ';
     }       
    

  $listservices  =   $this->db->query($services)->result();
  $listnews   =   $this->db->query($news)->result();
  $listpages  =   $this->db->query($pages)->result();
  $listreports  =   $this->db->query($reports)->result();


//Configure href
  foreach ($listservices as $key => $value) {
    $value->href = base_url().'services/'.($value->slug);
  }  
  foreach ($listnews as $key => $value) {
    $value->href = base_url().'news/'.($value->slug);
  }  
  foreach ($listpages as $key => $value) {
    $value->href = base_url().'pages/'.($value->title);
  }  
  foreach ($listreports as $key => $value) {
    $value->href = base_url().'reports/'.($value->slug);
  }

    $data = array(
        'listservices' => $listservices,
        'listnews' => $listnews,
        'listpages' => $listpages,
        'listreports' => $listreports,
        'what' => $_SESSION['what'],
        'PageTitle' => 'Search Result'
    );  
// echo "<pre>";
// print_r($data);exit();
 return $data;


        }

        

        

    }