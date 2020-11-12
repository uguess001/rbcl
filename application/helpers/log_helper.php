<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Page Model Class
 *
 * @package		CodeIgniter
 * @subpackage          Models
 * @category            Models
 * @author		Bishal Lepcha<lepchaboy47@gmail.com>
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */

function GetFiscalYear($Current=NULL){
  $ci = &get_instance();
  $sql= "select * from fiscalyear where 1 = 1 ";
  if($Current=="Current") {
    $sql.="and current_date() between start_date and end_date";  
  }
  return $ci->db->query($sql)->result();
}

function GetMonitotingIDs($OrgnizationID){
  $ci = &get_instance();
  $sql= "select monitoringID from seedmonitor where organizationId = ".$OrgnizationID;
  $MonitoringIDS = $ci->db->query($sql)->result();
  if(!empty($MonitoringIDS)) {
    $temp = NULL;
    foreach ($MonitoringIDS as $key => $value) {
      $temp[]=$value->monitoringID; 
    }
    return $MonitoringIDS=implode(',', $temp);
  }
  return NULL;
}

function create_breadcrumb(){
  $ci = &get_instance();
  $ci->load->library('Encryption');
  $i=1;
  $uri = $ci->uri->segment($i);
  $link = '<ul>';
  $link = '<ol class="breadcrumb">';
 
  while($uri != ''){
    $prep_link = '';
  for($j=1; $j<=$i;$j++){
    $prep_link .= $ci->uri->segment($j).'/';
  }
 
  if($ci->uri->segment($i+1) == ''){
    $link.='<li><a href="'.site_url($prep_link).'"><b>';
    $link.=ucfirst($ci->uri->segment($i)).'</b></a></li> ';
  }else{
    $link.='<li> <a href="'.site_url($prep_link).'">';
/*print_r($ci->Encryption->decode($ci->uri->segment($j)));
echo '<br>';*/
        
        //print_r($i);
        echo "<br>";
        //print_r($ci->uri->segment($j));
        if($j==0) {
            $str = "Dashboard";
        }
        else
        {
            $str = intval($ci->Encryption->decode($ci->uri->segment($j)))?'Recordwwwwwwwwww':ucfirst($ci->uri->segment($j));
        }
        print_r($str);
        /*print_r(intval($ci->Encryption->decode($ci->uri->segment($j)))?'Record':ucfirst($ci->uri->segment($j)));*/
        //print_r($str);

    $link.=($i==1)?'Dashboard':(intval($ci->Encryption->decode($ci->uri->segment($j)))?'Record':ucfirst($ci->uri->segment($j))).'</a></li> ';
    //$link.=$str;
  }
 
  $i++;
  $uri = $ci->uri->segment($i);
  }
    //$link .= '</ul>';
  $link .= '</ol>';
    return $link;
  }



/*
 * Add Log data
 */
function changeNumberUnicode($value=NULL,$mode=0)
            {
            //2406
            /*
            &#2406 is also return 0 number
            &#1086; return bigger 0 then  &#2406;
            */
            $length=strlen($value);
            $arrayNumber=array("-"=>"&#45;","("=>"&#40;",")"=>"&#41;","0"=>"&#2406;","1"=>"&#2407;","2"=>"&#2408;","3"=>"&#2409;","4"=>"&#2410;","5"=>"&#2411;","6"=>"&#2412;","7"=>"&#2413;","8"=>"&#2414;","9"=>"&#2415;","+"=>"&#043;",","=>"&#044;");
            if($mode==1){ 
            $length=mb_strlen($value,"utf-8");
            foreach($arrayNumber as $key=>$val){
            $newArrayNumber[asciiToUtf8($val)]=$key;                
            }           
            }           

            $newStr=NULL;
            for($i=0;$i<$length;$i++){
            if($mode=="1"){
            if(isset($newArrayNumber[mb_substr($value,$i,1,"utf-8")])){
            $newStr.=$newArrayNumber[mb_substr($value,$i,1,"utf-8")];
            }else{
            $newStr.=mb_substr($value,$i,1,"utf-8");

            }
            }else{
            if($arrayNumber[substr($value,$i,1)])
               
            $newStr.=$arrayNumber[substr($value,$i,1)];

            else
            $newStr.=substr($value,$i,1);
            }
            }
            return $newStr;

}
function update_dop_user_log($slug)
{
    $ci         = & get_instance();
    $name       = $ci->session->userdata('username');
    $user_type  = $ci->session->userdata('role');
    
    $log_data   = array(
        'user_id'   => 1,
        'user'      => $name,
        'activity'  => $slug,
        'user_type' => $user_type,
        'date'      => date("Y-m-d H:i:s"),
		    'ip_address' =>get_ipaddress()
    );
 
    $ci->db->insert('log', $log_data);
    return TRUE;
}

/*
 * Get Barcode with id
 */

    function get_barcode($id)
    {
        $ci = & get_instance();
        $rec = $ci->db->select('barcode')
                        ->where('public_id', $id)
                        ->get('tbl_barcode')
                        ->row();
        return $rec->barcode;
    }
    
function convert2english($nepali_date){
$ci         = & get_instance();
$name       = $ci->load->library('nepalidate');
$calendar = new CI_Nepalidate();

return $calendar->nep_to_eng($nepali_date);
}
function convert2nepali($english_date){
$ci         = & get_instance();
$name       = $ci->load->library('nepalidate');
$calendar = new CI_Nepalidate();
return $calendar->eng_to_nep($english_date);
}


/*
 * Get Current 
 * User IP
 */

function get_ipaddress()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
    //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


 function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = '4105031';
    $secret_iv = '4105031';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

	function limit_text1( $text, $limit = 1000) {
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
	
	function sym_emailremover($string) {
		$pattern = "/[^@\s]*@[^@\s]*\.[^@\s]*/";
		$replacement = "[removed]";
		return str_replace ("@", "[at]", $string);
	}

  function paginate($total_rows=0,$base_url=null,$limit=10){
        $ci     = & get_instance();
        $ci->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit; 
        $config['full_tag_open'] = ' <div class="pageinate"><div class="news-pagination"><ul class="list-unstyled list-inline">';
        $config['full_tag_close'] = '</ul></div></div>';
        $config['first_link'] = ' First';
        $config['first_tag_open'] = '<li class="prev page list-inline-item">';
        $config['first_tag_close'] = '</li>';
        $config['first_url'] = '0';
        $config['last_link'] = 'Last ';
        $config['last_tag_open'] = '<li class="next page list-inline-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next ';
        $config['next_tag_open'] = '<li class="next page list-inline-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '<li class="previous list-inline-item page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active list-inline-item"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page list-inline-item">';
        $config['num_tag_close'] = '</li>';
        $ci->pagination->initialize($config); 
        return  $ci->pagination->create_links();
     }
	
