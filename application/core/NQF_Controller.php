<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class NQF_Controller extends CI_Controller {
    /*
     * Default Current Language
     */

    public $cur_lang;

    public function __construct() {
        parent::__construct();		
		$this->load->library('encrypt');
        $this->load->helper('log');
        $this->Encryption = new Encryption();
        // $this->load->library('session');
        $this->load->model('settings/MSettings');
		$this->load->model('pages/MPages');





		
        $settings = $this->MSettings->get_by('id', '1');
        if ($settings && $settings->offline == '1') {
            echo $settings->offline_message;
            exit;
        }
		
		$this->set_default_language($this->session->userdata('lang') ? $this->session->userdata('lang') : 'en');
        //var_dump(base_url());die;
        define('RESOURCE_PATH', base_url() . 'application/resources/site/');
        $this->template->set_template('default');
		$lang = $this->cur_lang;
		
		
		
		$test = $this->db->query("SELECT year,gross_premium as total from tbl_fiscalyearwise_report
			")->result();

			// $test = $this->db->query('SELECT year,gross_premium as total from tbl_fiscalyearwise_report where 1=1')->result();

		$chart_array = [];
		$chart_array_name = [];	

		


		if($test){
			foreach($test as $value){
				$chart_array[] = (int) $value->total;
				$chart_array_name[] =  $value->year;
			}
		}


	/////////////////////////////////////////////////////////
			$portfolio = $this->db->query("
				SELECT portfolio, ( `shrawan` + `bhadra` + `ashoj`+`kartik`+`mangsir`+`poush`+`magh`+`falgun`+`chaitra`+`baisakh`+`jestha`+`ashar`) AS total 
				FROM `tbl_portfoliowise_report` where portfolio !='Total'
			")->result();


		$chart_array_po = [];
		$chart_array_name_po = [];	

		


		if($portfolio){
			foreach($portfolio as $value){
				$chart_array_po[] = (int) $value->total;
				$chart_array_name_po[] =  $value->portfolio;
			}
		}	


        $data = array(
            
			'chart' => json_encode($chart_array),
			'chart_name' => json_encode($chart_array_name),

			'chart_po' => json_encode($chart_array_po),
			'chart_name_po' => json_encode($chart_array_name_po),

			'settings'=>$settings, 
			//'project_status' =>$this->db->select('*')->limit(0,10)->where('status', '1')->get('program')->result(),
			'lang'=>$lang,
			'flagmap'			=> $this->db->query("SELECT id,address_$lang as address,longitude,latitude from contactus where 1=1")->result(),
			'services' => $this->db->query("SELECT id,image,title_$lang as title, description_$lang as description, slug,icon from services where status='1'")->result(),
			'gallery'=>$this->db->query("SELECT id, title_en,  image from tbl_gallery where status=1 order by id desc limit 0,1 ")->result(),
			'usefullinks'=>$this->db->query("SELECT id, status, category, url, title_$lang as title from links where status='1' and category='1'")->result(),
			'quicklinks'=>$this->db->query("SELECT id, status, category, url, title_$lang as title from links where status='1' order by id asc")->result(),
			'contactus'     => $this->db->query("SELECT id,address_$lang as address, phone, web, pobox,fax,email,youtube,facebook,instagram,twitter,feed,googleplus,webmail,map from contactus")->row(),
			'branch_office'     => $this->db->query("SELECT id,address_$lang as address, phone, fax, email, head_office from contactus where head_office=2")->result(),
			'subbranch_office'     => $this->db->query("SELECT id,address_$lang as address, phone, fax, email, head_office from contactus where head_office=3")->result(),
			'branch_manager'     => $this->db->query("SELECT id, name_$lang as name, image, post_$lang as post, designation_$lang as designation, post_$lang as post, phone, email, description_$lang as description from staffs where designation_$lang=4 ORDER BY group_order ASC")->result(),
			'management_team'     => $this->db->query("SELECT id, name_$lang as name, image, post_$lang as post, designation_$lang as designation, post_$lang as post, phone, email, description_$lang as description from staffs where designation_$lang=3 ORDER BY group_order ASC")->result(),
			'chairman'=>$this->db->query("SELECT id, name_$lang as name, image, post_$lang as post, designation_$lang as designation, post_$lang as post, phone, email, description_$lang as description from staffs where designation_$lang=1 ORDER BY group_order ASC")->row(),
			'boardmember'=>$this->db->query("SELECT id, name_$lang as name, image, post_$lang as post, designation_$lang as designation, post_$lang as post, phone, email, description_$lang as description from staffs where designation_$lang=2 ORDER BY group_order ASC")->result(),
			'video'=>$this->db->query("SELECT * from video where status=1")->result(),
			'documents'=>$this->db->query("SELECT id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='1' order by id desc limit 5")->result(),
			'circulars'=>$this->db->query("SELECT id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='2' order by id desc limit 5")->result(),
			'bulletins'=>$this->db->query("SELECT id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='3' order by id desc limit 5")->result(),
			'news'=>$this->db->query("SELECT id,title_$lang as title,description_$lang as description,image, slug, CreatedOn from news where status=1 order by id desc limit 2" )->result(),
			'menulist' =>$this->db->query("SELECT id,link,parent,sort,status,link,label_$lang as label FROM tbl_menu WHERE parent = '0' and status = '1' ORDER BY sort ASC")->resulT(),
			'childlist' =>$this->db->query("SELECT id,link,parent,sort,status,link,label_$lang as label FROM tbl_menu WHERE   parent !='0' and status = '1' ORDER BY sort ASC")->resulT(),
			'reinsure' => $this->db->query("SELECT id,slug, title_$lang as title from weensure where showonfooter = '1' and status = '1' ")->result(),
			'services_on_footer' => $this->db->query("SELECT id,slug, title_$lang as title from services where showonfooter = '1' and status = '1' ")->result(),
			'payments' => $this->db->query("SELECT id,link,image, title_$lang as title from payments where status = '1' ")->result(),

		);


	    /*echo "<pre>";

		print_r($data['flagmap']);
		echo "</pre>";*/
		$this->template->write_view('meta', 'templates/site/partials/meta',$data);
		$this->template->write_view('header', 'templates/site/partials/header',$data, TRUE);
		$this->template->write_view('navigation', 'templates/site/partials/navigation', $data, TRUE);
	    $this->template->write_view('content_left', 'templates/site/partials/content_left', $data, TRUE);
		$this->template->write_view('scripts', 'templates/site/partials/scripts', $data, TRUE);
		$this->template->write_view('footer', 'templates/site/partials/footer', $data, TRUE);

    }


















	public function set_default_language($lang) {
        $this->cur_lang = $lang;
        $this->lang->load('general', $lang == 'np' ? 'nepali' : 'english');
        $this->session->set_userdata('lang', $this->cur_lang);
    }
	
	public function set_default_languageocc($lang) {
		print_r($lang);
		if(!isset($_SESSION["lang"])) {
			session_start();
			$_SESSION["lang"]="en";$this->cur_lang ="en";print_r("condition if");
		}
		else { print_r("condition else");
			if($_SESSION["lang"]="en") {$_SESSION["lang"]="np";}else {$_SESSION["lang"]="en";}
			$this->cur_lang=$_SESSION["lang"];
		}
		$this->session->set_userdata('lang',"np");
        $this->lang->load('general', $this->cur_lang == 'np' ? 'nepali' : 'english');
    }

    public function get_default_language() {
        return $this->cur_lang;
    }
	
	public function limit_text( $text, $limit = 1000) {
        if ( strlen ( $text ) < $limit ) {
            return $text;
        }

        $split_words = explode(' ', $text );
        $out = null;
		
			foreach ( $split_words as $word ) {
				if ( ( strlen( $word ) > $limit ) && $out == null ) {
					return substr( $word, 0, $limit )."...";
				}
				
				if (( strlen( $out ) + strlen( $word ) ) > $limit) {
					return $out . "...";
				}            
				$out.=" " . $word;
			}
        return $out;
    }
}
