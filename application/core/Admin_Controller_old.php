<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Admin_Controller extends CI_Controller
	{
			var $allow_access;
			var $admin_table = 'users';
			var $Encryption = null;
			var $Group = null;
			
		public function __construct() {
			parent::__construct();
			$this->Encryption = new Encryption();
			$this->load->helper('pagination');
			$this->load->helper('menu');
			$this->load->helper('log');
			$this->load->helper('custform_helper');


			//Loading Common Models

			$this->load->model('usertype/Musertype');
			$this->load->model('status/Mstatus');
			$this->load->model('gender/Mgender');
			$this->load->model('position/Mposition');


			//print_r($this->Musertype->primary_key);







		



			


			define('ADMIN_RESOURCE_PATH', base_url().'application/resources/admin/');
			$this->load->helper('url');
			$this->allow_access = ($this->auth_admin()) ? TRUE : FALSE;
					if($this->allow_access) {
						$data = array('siteTitle' => $this->db->select('site_name')
													->get('settings')
													->row(),
										'parent_menu' => get_parent_menu(),
										'hit'=>$this->db->query("select hit,url from (select times as hit,url from url_counter order by times asc limit 0,1) as t union 
select max(times) as hit,url from url_counter")->result(),
				'groupcooperativeinformation'=>$this->db->query("select * from groupcooperativeinformation")->result(),
										'menus'=>$this->db->query("select * from menu where show_menu=1 order by show_order")->result()


										//'stat'=>$this->db->query("select (select count(id) from blog_details where active =0) as comments, (select count(id) from blog where status ='0') as blog")->result()
						); 
						$this->load->library('Template');
						$this->template->set_template('admin');
						$this->template->write_view('meta', 'templates/admin/partials/meta', $data, TRUE);
						$this->template->write_view('top_nav', 'templates/admin/partials/top_nav');
						$this->template->write_view('nav', 'templates/admin/partials/nav',$data,TRUE);
						$this->template->write_view('page_header', 'templates/admin/partials/page_header');
						$this->template->write_view('breadcrumbs', 'templates/admin/partials/breadcrumbs');
						$this->template->write_view('content', 'templates/admin/partials/home');
						$this->template->write_view('scripts', 'templates/admin/partials/scripts');
						$this->template->write_view('footer', 'templates/admin/partials/footer');
						

					} else {
						$this->load_loginview();
					}
		}
		
		function index() {   
						if(!$this->allow_access) {
							redirect('admin/login');
							exit();
						}
					}
					
		function login() {
					if($this->allow_access) {
						redirect('admin');
						
						exit();
					}
					
					if($this->input->post('login')) {  //print_r($this->input->post('csrftoken')."next".$this->session->userdata('csrftoken')); exit();
						$this->load->library('form_validation');
						$this->form_validation->set_rules('username', 'Username', 'required');
						$this->form_validation->set_rules('password', 'Password', 'required');
						if($this->form_validation->run() == FALSE) {
							$this->session->set_flashdata('err_login', 'Validation Failed');
							redirect('admin/login'); } else {
							$username   = $this->input->post('username');
							$password   = md5($this->input->post('password'));
							
							//print_r($this->input->post('csrftoken')); exit();if($this->session->userdata('csrftoken') === $this->input->post('csrftoken'));
							//if($this->session->userdata('csrftoken') === $this->input->post('csrftoken')) {print_r("sdfdsfds");}exit();
							// print_r($this->input->post('csrftoken')."next".$this->session->userdata('csrftoken'));exit();
							if(1) { 
							if($this->login_check($username, $password)) {
									redirect('admin'); } else { 
									$this->session->set_flashdata('err_login', 'Invalid Login Credentials');
									redirect('admin/login');
								}
							}
						} 
						} else { 
							$this->load_loginview();
						}
		}

		function login_check($username, $password) {
			if($username == '' OR $password == '') return false;
			if( $this->session->userdata('username') && $this->session->userdata('username') == $username){ return true;}
			$query = $this->db->select('*')
								  ->where('username', $username)
								  ->where('password', $password)
								  ->get('users')->row();
								  
			if ($query) {
				$user_data['name']      = $query->name;
				$user_data['username']  = $query->username;
				$user_data['userid']    = $query->id;
				$user_data['logged_in'] = true;
				$user_data['user_type'] = $query->user_type;
				$this->session->set_userdata('user_type',$query->user_type);
				$this->session->set_userdata($user_data);
				
				return true;

			} else { return false; }
		}

		function logout() {
			$this->session->sess_destroy();
			redirect('admin/login');
		}

		function load_loginview() {
			$data = array(
			'siteTitle' => $this->db->select('site_name')
						->get('settings')
						->row()->site_name
					);
			//$this->load->helper('form');
			$this->session->set_userdata('csrftoken', sha1(time()));
			$this->load->view('templates/admin/login',$data);
			
			
		}
		
		function auth_admin() {
			return ($this->session->userdata('username') != '' && $this->session->userdata('logged_in') == true) ? true : false;
		}

	}