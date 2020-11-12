<?php	

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pcalculator extends NQF_Controller {
	
	
	private $contact_rule = array(
							array(
							'field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|xss_clean'
							),
							array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|required|valid_email||xss_clean'
							),
							array(
							'field' => 'comment',
							'label' => 'Message',
							'rules' => 'trim|required|xss_clean'
							)
          				 );

    
    function __construct() {
        parent::__construct();

		$this->load->model('pages/MPages');
		$this->load->library('encrypt');
		$this->load->helper('captcha');
		$this->load->helper('log');
		$this->load->library('form_validation');
		$this->load->model('gallery/Mgallery');

				//Email Configure for no reply 
		$this->sendmail_host = 'mail.rbcl.com.np';
        $this->sendmail_username = 'no-reply@rbcl.com.np';
        $this->sendmail_password = '9X[]$$D~M+Q['; // 'akbKmL';


		
    }
	

public function test() { 

			 // return all our data to an AJAX call
    		// return a response ===========================================================

			    // if there are any errors in our errors array, return a success boolean of false
			    if (empty($_POST)) {

			        // if there are items in our errors array, return those errors
			        $result['success'] = false;
			        $result['errors']  = "POST somthing.";
			    } else {

			        // if there are no errors process our form, then return a message

			        // DO ALL YOUR FORM PROCESSING HERE
			        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

			        // show a message of success and provide a true success variable
			        $result['success'] = true;
			        $result['message'] = 'Success!';
			        $result['data'] = $_POST;
			    }

			    // return all our data to an AJAX call
			    echo json_encode($result);

}




// and shownews=1
	public function index() { 


		$lang = $this->cur_lang;
        $data = array(
		
		); 
			$this->template->write_view('content_left', 'templates/site/partials/pcalculator', $data, TRUE);
			$this->template->render();
    }


    public function api() {

	/*
	"pSuminsured": "200000",
    "pUtilitiesAmt": "0",
    "pOtherSI": "0",
    "pCC_HP_SEATS": "200",
    "pManufactureYr": "2018",
    "pCExcess": "2000",
    "pNCD":"1",
    "pIsComprehensive":"true",
    "pTYPEOFCOVER":"CM",
    "pDeptid":"02",
    "pVehicleAge":"2",
    "pIssueDate":"1-jan-2020",
    "pHasAgent":"false",
    "pClassid":"21",
    "pDriverSuminsured":"500000.00",
    "pPassengerSuminsured":"500000.00",
    "pHelperSuminsured":"500000.00",

    "pNo_of_Driver":"1",
    "pNo_of_Helper":"1",
    "pNo_of_Passenger":"0",
    "pVehicleCategoryid":"1",
    "isGovernment":"0",
    "pPrivateUse":"true",
    "pExcludePool":"true",
    "pIncludetowing":"true"
	*/

$api=file_get_contents('http://203.78.160.21:9096/api/Data/tariffdata');

print_r($api); exit();


		if ($api) {
					$response = array(
						'error'    		=> false,
						'message'      	=> 'Thank you for your feedback !',
					);
					
				}else{
					$response = array(
						'error'    		=> true,
						'message'      	=> 'Error: Pelase Try Again,',
					);
					
				}
		

		echo json_encode($response);
					exit();		
    }









		public function change($key) {
		$success_msg = null;
				$failure_msg = null;	
	$userid = $this->db->where('token_no',$key)->select('userid')->get('token_register')->result();	
	if(empty($userid)) {
		print_r("Sorry,invalid request to change password.");
		//$this->forgot_password();
		redirect(base_url()."welcome/forgot_password");
	}
	if(!isset($key) && empty($key)) {
		redirect(base_url());
	}
	if(!isset($userid) && empty($userid)) {
		print_r("Sorry,invalid request to change password.");exit();
	}
	if($this->input->post('process')=="1") {
		if(isset($userid) && !empty($userid)) {
			$data = array('password'=>md5($this->input->post('password')));
			if($this->db->where('id',$userid[0]->userid)->update('users',$data)){
				
				$query = $this->db->select('*')
								  ->where('id', $userid[0]->userid)
								  ->get('users')->row();
				if($query) {
					$user_data['name']      = $query->name;
					$user_data['username']  = $query->username;
					$user_data['userid']    = $query->id;
					$user_data['logged_in'] = true;
					$user_data['user_type'] = $query->user_type;
					$this->session->set_userdata('user_type',$query->user_type);
					$this->session->set_userdata($user_data);
					redirect(base_url()."/admin");
				}
			}
			exit();
		}
		else {
			print_r("Sorry,couldnot change password.");exit();
		}
	}
	
	
			$data = array('breadcrumbs'=>'Feedback','success'=>$success_msg,'failure_msg'=>$failure_msg);
			$this->session->set_userdata('csrftoken', sha1(time()));
			$this->template->write_view('inner_content', 'templates/site/partials/change_pass', $data, TRUE);
			$this->template->write_view('news_tab', 'templates/site/partials/news_tab', $data, TRUE);
			$this->template->render();
	}
	
	
	
		    function generate_code($length = 10)
        {
                if ($length <= 0)
                {
                        return false;
                }

                $code = "";
                $today = date('ymdhis');
                $chars = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
                srand((double)microtime() * 1000000);
                for ($i = 0; $i < $length; $i++)
                {
                        $code = $code . substr($chars, rand() % strlen($chars), 1);
                }
                return $code.$today;

        }
	var $token_reg = true;
	var $token_val;
	var $to_email = null;
	
	public function register_token($id){
		$this->token_val = $this->generate_code();
		date_default_timezone_set('Asia/Kathmandu');
		$date = date('Y-m-d', time());
		$data = array('token_no'=>$this->token_val,'userid'=>$id,'created_on'=>$date);
		$config['wordwrap'] = TRUE;
		$this->load->library('email',$config);
		$from =$this->db->select('admin_email')->get('settings')->row();
		$this->email->from(isset($from)?$from->admin_email : 'info@site.gov.np', 'Office of Controller of Certification - Admin');
		$this->email->to($this->to_email);
		$this->email->subject('site Reset Link');
		$this->email->message('Please use reset link '.base_url().'welcome/change/'.$this->token_val.'  to reset your password.');
		if(!$this->db->insert('token_register',$data)) {$this->token_reg=false;} 
		if(!$this->email->send()) {$this->token_reg=false;} 
		
	}

	
	public function forgot_password() {
				$success_msg = null;
				$failure_msg = null;		
			
			if($this->input->post('process')==true) {
				
				$info = $this->db->where('email',$this->input->post('email'))->select('id,email,username')->get('users')->result();
				if(isset($info) && !empty($info)) {
					$this->to_email = $info[0]->email;
					$this->register_token($info[0]->id);
					if($this->token_reg==false) {
					$failure_msg 	=	"<div class=alert style=color:red;><a class=close data-dismiss=alert>X</a>
										<strong>Sorry</strong> , unnable to register token.
										Please try again.</div>";
					}
					else
					{
						$success_msg 	=	"<div class=alert style=color:green;><a class=close data-dismiss=alert>X</a>
										<strong>Success</strong> , Reset link has been sent on your email.</div>";
						print_r($success_msg);
					}
				}
				else
				{
					$failure_msg 	=	"<div class=alert style=color:red;><a class=close data-dismiss=alert>X</a>
										<strong>Sorry</strong> , unnable to find your email address registered in the system.
										Please contact website administrator.</div>";
				}
			}
			$data = array('breadcrumbs'=>'Feedback','success'=>$success_msg,'failure_msg'=>$failure_msg);
			$this->session->set_userdata('csrftoken', sha1(time()));
			$this->template->write_view('content_right', 'templates/site/partials/forgot', $data, TRUE);
			$this->template->write_view('news_tab', 'templates/site/partials/news_tab', $data, TRUE);
			$this->template->render();
	
	}
	

	

        	
	
	

		public function hitcounter()
		{	
    $url = $this->input->post('url');

    $sql = "INSERT INTO url_counter (url_id, url, times)";
    $sql .= " VALUES (?, ?, 1) ON DUPLICATE KEY UPDATE times=times+1";

    $this->db->query($sql, array(sha1($url), $url));

    echo 'OK';
}
   






 function sendFeedBackMail($firstname,$lastname,$emailfrom,$phone,$messagedetail,$emailto,$ipaddress){
        $email_data = array (
            'title'             => 'Rastriya Beema Company Limited (RBCL)',
            'name'              => $firstname.' '.$lastname,
            'subject'           => 'Public Contact/Feedback',
            'company_name'      => 'Rastriya Beema Company Limited (RBCL)',
            'email'             => $emailto,
            'messagedetail'     => $messagedetail,
            'emailfrom'         => $emailfrom,
            'phone'           	=> $phone,
            'ipaddress'			=> $ipaddress,
        );

 /*       print_r($email_data);
        exit();*/

        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();

        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = false; // enabled SMTP authentication

        // $mail->SMTPAuth   = true; // enabled SMTP authentication
        // $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server

        $mail->Host       = $this->sendmail_host;      // setting GMail as our SMTP server
        // $mail->Port       = 25;                   // SMTP port to connect to Server
        $mail->Port       = 587;                   // SMTP port to connect to Server
        $mail->Username   = $this->sendmail_username;  // user email address
        $mail->Password   = $this->sendmail_password;            // password in GMail

        $mail->SetFrom($this->sendmail_username, $email_data['title']);  //Who is sending
        $mail->isHTML(true);
        $mail->Subject      = $email_data['subject'];
        $mail->Body         = $this->load->view("templates/site/email/feedbackmail", $email_data, TRUE);
        $mail->AddAddress($email_data['email'], $email_data['name']);

        $mail->SMTPOptions = array(
            'ssl' => array(
	            'verify_peer' => false,
	            'verify_peer_name' => false,
	            'allow_self_signed' => true
        	)
        );
        if (!$mail->send()) {
           // echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        } else {
           // echo "Message sent!";
            return true;
        }
    }




	public function insertfeedback() {
		$lang = $this->cur_lang;

		if($this->input->post('checkprocess', TRUE) == 'true') {

			$this->form_validation->set_rules('department', 'Department', 'required');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric');
			$this->form_validation->set_rules('message', 'Message', 'required|min_length[10]');


			if ($this->form_validation->run() == TRUE){
				$departmentid = $this->input->post('department');

				$emailfrom = $this->db->query("SELECT email from services where id=$departmentid")->row();

				// $emailto =  'yamanlimboo@gmail.com'; //$emailfrom->email;
				//email to 
				$emailto = $emailfrom->email;

				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$emailfrom = $this->input->post('email');
				$phone = $this->input->post('phone');
				$messagedetail = $this->input->post('message');
				$ipaddress = $this->input->ip_address();
	



				 $mailsend = $this->sendFeedBackMail($firstname,$lastname,$emailfrom,$phone,$messagedetail,$emailto,$ipaddress);



				if ($mailsend) {
					$response = array(
						'error'    		=> false,
						'message'      	=> 'Thank you for your feedback !',
					);
					echo json_encode($response);
					exit();
				}else{
					$response = array(
						'error'    		=> true,
						'message'      	=> 'Error: Pelase Try Again,',
					);
					echo json_encode($response);
					exit();
				}
			} else {
				$response = array(
					'error'    		=> true,
					'message'      	=> $this->form_validation->error_array(),
				);
				echo json_encode($response);
				exit();
			}
		}else{
			$response = array(
				'error'    => true,
				'message'  => 'Please Try Again' ,
			);
			echo json_encode($response);
			exit();
		}
	}










		 public function feedback() {
	 	
		 $lang = $this->cur_lang;
		if(isset($_POST['feedbackprocess'])) { 
		$this->form_validation->set_rules('captcha', "Captcha", 'required');
		 /* Get the actual captcha value that we stored in the session (see below) */
       $word = $this->session->userdata('captchaWord');
	    /* Get the user's entered captcha value from the form */
       $userCaptcha = $this->input->post('captcha');
       /* Check if form (and captcha) passed validation*/
        if ($this->form_validation->run() == TRUE && strcmp(strtoupper($userCaptcha),strtoupper($word)) == 0)
        {
			 $this->session->unset_userdata('captchaWord');
			 // insert to db
        
			
			$email_config = Array(
										
										'mailtype' => 'html',
										'charset' => 'iso-8859-1'
			);
		$settings = $this->MSettings->get_by('id', '1');
		$email = $this->input->post('department');
		$emailfrom=$this->db->query("select email from services where id=$email")->row();
		$email = $emailfrom->email;
// 		switch ($email) {
//     case 1:
//         $email=$settings->fire_insurance?$settings->fire_insurance:$settings->admin_email;
//         break;
//     case 2:
//        $email=$settings->motor_insurance?$settings->motor_insurance:$settings->admin_email;
//         break;
//     case 3:
//         $email=$settings->aviation_insurance?$settings->aviation_insurance:$settings->admin_email;
//         break;
//     case 4:
//        $email=$settings->marine_insurance?$settings->marine_insurance:$settings->admin_email;
//         break;
//     case 5:
//     	$email=$settings->engineering_insurance?$settings->engineering_insurance:$settings->admin_email;
        
//         break;
//     case 6:
//     	$email=$settings->medical_insurance?$settings->medical_insurance:$settings->admin_email;
//         break;
//     case 7:
//         $email=$settings->miscellaneous_insurance?$settings->miscellaneous_insurance:$settings->admin_email;
//         break;
//     case 8:
//         $email=$settings->traveling_insurance?$settings->traveling_insurance:$settings->admin_email;
//         break;
//     default:
//        $email=$settings->prefessional_insurance?$settings->prefessional_insurance:$settings->admin_email;
// }
//print_r($email);exit();
			
				$admin_email =$email;
				$name = $this->input->post('firstname').' '.$this->input->post('lastname');
				$email = $this->input->post('email');
				$message = "Dear Admin, <br/>" .
				"Contact Information of Users:" .'<br/>'.
				"<b>Name</b> :- " . $name .'<br/>'.
				"<b>Email:-</b> " . $email .'<br/>'.
				"<b>Contact Number:-</b> " . $this->input->post('phone') .'<br/>'.'<br/>'.
				"<b>Message:-</b> " . $this->input->post('message');
				$this->load->library('email', $email_config);
				$this->email->set_newline("\r\n");
				$this->email->from($this->input->post('email'), 'RBCL Public Feedback');
				$this->email->to($admin_email);
				//$admin_email="shyam@dryicesolutions.net";
				$this->email->subject("Public Contact/Feedback");
				$this->email->message($message);
			
					if ($this->email->send()) {
						echo "<script type='text/javascript'>alert('Thank you for your feedback !');</script>";
							echo "<meta http-equiv=REFRESH CONTENT=0;url='".base_url()."'>";exit();
					}
			
		}
		else{
			/** Validation was not successful - Generate a captcha **/
			
			/* Setup vals to pass into the create_captcha function */
			// numeric random number for captcha
			$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
			// setting up captcha config
			$vals = array(
			'word' => $random_number,
			'img_path' => 'uploads/captcha/',
			'img_url' => base_url().'uploads/captcha/',
			'img_width' => 217,
			'img_height' => 54,  
			'expiration' => 7200
			);
			
			
			/* Generate the captcha */
			$captcha = create_captcha($vals);
			
			/* Store the captcha value (or 'word') in a session to retrieve later */
			$this->session->set_userdata('captchaWord', $captcha['word']);
			echo "<script type='text/javascript'>alert('Your Captcha did not match');</script>";
			$captcha['error_message'] = 'Captcha not matched.';                
          
            /* Load the captcha view containing the form (located under the 'views' folder) */
          	$data['captcha'] = $captcha;
          	$this->template->write_view('content_left', 'templates/site/partials/contact', $data);

		}
	}







	$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
			// setting up captcha config
			$vals = array(
			'word' => $random_number,
			'img_path' => 'uploads/captcha/',
			'img_url' => base_url().'uploads/captcha/',
			'img_width' => 217,
			'img_height' => 54,
			'expiration' => 7200
			);
		
		$captcha = create_captcha($vals);
		$this->session->set_userdata('captchaWord',$captcha['word']);

		
		
		$data['captcha'] = $captcha;
	

		 
			
			$this->template->write_view('content_left', 'templates/site/partials/contact', $data, TRUE);
			$this->template->render();
    }
	

	

function citizenCharter(){

	 $lang = $this->cur_lang;
        $data=array();
        $this->template->write_view('content_left', 'templates/site/partials/citizenCharter', $data, TRUE);
		$this->template->render();

}
	
	
	
	


	function ChangeLanguage() {
	    $lang = $this->cur_lang;
        $previous_url = $this->input->post('previous_url');
        //print_r($previous_url);exit();
        $frag_url = explode('/', $previous_url);
        //replacing later with base_url()
		unset($frag_url[0]);
       // unset($frag_url[1]);
		//unset($frag_url[2]); //uncomment this line for decicated server
		//unset($frag_url[3]);
		
        $previous_url = implode('/', $frag_url);
        if ($lang == 'en'):
            $this->set_default_language('np');
        else:
            $this->set_default_language('en');
        endif;
         //redirect(base_url() . $previous_url, 'refresh');
         redirect(base_url() . $previous_url, 'refresh');
		//echo '<script> window.location.href = "'.base_url().$previous_url. '";</script>';
        
	}


	 function ChangeLanguagesite() {
		$lang = $this->session->userdata('lang');
			if(!filter_var($this->input->get('previous_url'), FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) {
				print_r("Oops Exception Caught.");exit();
			}
		$previous_url = $this->input->get('previous_url');
		if ($lang == 'en') { $this->set_default_language('np'); } else { $this->set_default_language('en');}
			
			
			//redirect($previous_url);
			
	}

	public function sitemap() {
        $lang = $this->cur_lang;
        $data=array();
        $this->template->write_view('content_left', 'templates/site/partials/sitemap', $data, TRUE);
		$this->template->render();
    }

    public function allStaffs() {
        $lang = $this->cur_lang;
        $data=array();
        $this->template->write_view('content_left', 'templates/site/partials/allstaffs', $data, TRUE);
		$this->template->render();
    }




    function send_quote(){
    	//print_r($_POST);exit();
    	$settings = $this->MSettings->get_by('id', '1');
    	if($this->input->post()){
    		$data=array(
    			'name'=>$this->input->post('name'),
    			'email'=>$this->input->post('email'),
    			'phone'=>$this->input->post('phone'),
    			'insurance'=>$this->input->post('insurance'),
    			'message'=>$this->input->post('message'),
    			'date'=>date('Y-m-d'),
    		);
    		$this->db->insert('received_quote',$data);
    		$subject='Quotation of the Insurance';
			$email = $data['email'];
			$id=2;
						      $email_config = Array(
										'mailtype' => 'html',
										'charset' => 'iso-8859-1'
			                        );
						
				$file=$this->db->query("select * from quote where id=".$data['insurance']."")->row();
				$contactus=$this->db->query("select * from contactus where head_office='1'")->row();
				$downloadfile=base_url().'uploads/quote/'.$file->file;
				$this->load->library('email', $email_config);				
				$this->email->clear();
				$this->email->set_newline("\r\n");
				$this->email->from($settings->admin_email);
				$this->email->subject($subject);					
				$this->email->to($email);
				$message = "Dear ".$data['name'].','. "<br/> <br/> <br/>".'Thank you for asking the quotation of <b>' .$file->title.'</b>. <br/> Your Representative will call back to you soon!!!'." <br/>"."<a href='$downloadfile'>".$file->file.'</a><br/>'.'<br/> <br/> Yours Sincerely'.'<br/>'.'Rastriya Beema Company Limited'.'<br/>'.'Phone:'.$contactus->phone;					
				$this->email->message($message);
				$this->email->send();
				$this->session->set_flashdata('_flash_msg', array(

                        '_css_cls' => 'success',

                        '_message' => 'Thank You, Please Check your Email!'

                    ));
			

    	}
    	$this->sendQuote($data);
		redirect( base_url());
    }

    function sendQuote($data){
$settings = $this->MSettings->get_by('id', '1');
$emailfrom=$this->db->query("select email from services where id='".$data['insurance']."'")->row();
$email = $emailfrom->email;
// switch ($email) {
//     case 1:
//         $email=$settings->motor_insurance?$settings->motor_insurance:$settings->admin_email;
//         break;
//     case 2:
//        $email=$settings->aviation_insurance?$settings->aviation_insurance:$settings->admin_email;
//         break;
//     case 3:
//         $email=$settings->fire_insurance?$settings->fire_insurance:$settings->admin_email;
//         break;
//     case 4:
//        $email=$settings->marine_insurance?$settings->marine_insurance:$settings->admin_email;
//         break;
//     case 5:
//         $email=$settings->medical_insurance?$settings->medical_insurance:$settings->admin_email;
//         break;
//     case 6:
//         $email=$settings->miscellaneous_insurance?$settings->miscellaneous_insurance:$settings->admin_email;
//         break;
//     case 7:
//         $email=$settings->engineering_insurance?$settings->engineering_insurance:$settings->admin_email;
//         break;
//     case 8:
//         $email=$settings->traveling_insurance?$settings->traveling_insurance:$settings->admin_email;
//         break;
//     default:
//        $email=$settings->prefessional_insurance?$settings->prefessional_insurance:$settings->admin_email;
// }
//print_r($email);exit();

    	$subject='Request for Insurance Quotation';
    	$this->load->library('email', $email_config);				
				$this->email->clear();
				$this->email->set_newline("\r\n");
				$this->email->from($data['email']);
				$this->email->subject($subject);					
				$this->email->to($email);
				$message = "Dear Admin, <br/>" .
				"Contact Information of Users:" .'<br/>'.
				"<b>Name</b> :- " . $data['name'] .'<br/>'.
				"<b>Email:-</b> " . $data['email'] .'<br/>'.
				"<b>Contact Number:-</b> " . $data['phone'] .'<br/>'.'<br/>'.
				"<b>Message:-</b> " . $data['message'];			
				$this->email->message($message);
				$this->email->send();
    }

    function getQuoteModal($id){
    	 $lang = $this->cur_lang;
    	$data=$this->db->query("select id,image,title_$lang as title, description_$lang as description,slug from services where status='1' and id=$id")->row();
    	echo json_encode($data);

    }

    function callback(){
    	if($this->input->post()){
    		$data=array(
    			'name'=>$this->input->post('name'),
    			'address'=>$this->input->post('address'),
    			'phone'=>$this->input->post('phone'),
    			'date'=>date('Y-m-d'),
    		);
    		$this->db->insert('callback',$data);
    		$this->session->set_flashdata('_flash_msg', array(

                        '_css_cls' => 'success',

                        '_message' => 'Thank You, We will Contact you soon!'

                    ));
    		
    		
    }

   
   redirect( base_url());
}

    
	




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */