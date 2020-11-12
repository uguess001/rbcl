<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Admin_Controller extends CI_Controller
	{
			var $allow_access;
			var $admin_table = 'users';
			var $Encryption = null;
			var $Group = null;
			var $page_header = "";
			var $bread_crumb="";
			var $menu_data = "";
			var $Version = "1.0";
			var $Application="";
			

			
		public function __construct() {
			parent::__construct();
			$this->load->model('Madmin_setup');
			$this->Application = "<h1>MIS<small>Version  ".$this->Version."</small></h1>";
			$this->Encryption = new Encryption();
			$this->load->helper('pagination');
			$this->load->helper('menu');
			$this->load->helper('log');
			$this->load->helper('custform_helper');
			$this->menu_data =$this->db->query("select * from menu order by name")->result();

			//Loading Common Models to be reuse everywhere in the page
			//$this->load->model('foldername/MSampel');

			define('ADMIN_RESOURCE_PATH', base_url().'application/resources/admin/');
			$this->load->helper('url');
			$this->allow_access = ($this->auth_admin()) ? TRUE : FALSE;
			if($this->allow_access) {

				$this->permissionCheck();
				$menulist = $this->Madmin_setup->getMenuList();
				$userid = $_SESSION['user_type'];
				$assigned_menu = $this->Madmin_setup->getUserRoleMenu($userid);
				if (!empty($assigned_menu)) {
					$assigned_parentmenu = array();
					$assigned_menulist = explode(',',$assigned_menu->MenuID);
					foreach ($assigned_menulist as $kl => $val) {
						$assigned_parentmenu[] = $this->Madmin_setup->getAssignMenuParentId($val);
					}

					$assigned_parentmenulist = array();
			        if (!empty($assigned_parentmenu)) {
				        foreach ($assigned_parentmenu as $key => $value) {
				            $assigned_parentmenulist[] = $value->parent_id;
				        }
			        }
				}

				$data = array(
					'parent_menu1'				=> $this->Madmin_setup->getParentMenu(),
					'menus'						=> $this->Madmin_setup->getMenuList(),
					'assigned_menu'				=> $assigned_menu,
					'assigned_parentmenulist'	=> $assigned_parentmenulist,
					'SiteDetails' 	=>	$this->db->select('site_name,short_name,copyright_year')->get('settings')->row(),
					// 'parent_menu1'	=>	$this->db->query("select * from menu where parent_id is null order by show_order")->result(),
					// 'menus'			=>	$this->db->query("select * from menu where show_menu=1 order by show_order")->result(),
					'controller'	=>	$this
				);
				if(isset($_SESSION['parent_menu'])){
					$data['parent_menu']=$this->db->query("select * from menu where id in ('".$_SESSION['parent_menu']."') ")->result();
				}
				else
				{
					$data['parent_menu']=$this->db->query("select * from menu where parent_id is null")->result();
				}
				$this->load->library('Template');
				$this->template->set_template('admin');
				$this->template->write_view('meta', 'templates/admin/partials/meta', $data, TRUE);
				$this->template->write_view('scripts', 'templates/admin/partials/scripts', $data, TRUE);
				$this->template->write_view('top_nav', 'templates/admin/partials/top_nav', $data, TRUE);
				$this->template->write_view('nav', 'templates/admin/partials/nav', $data, TRUE);
				$this->template->write_view('footer', 'templates/admin/partials/footer');
			} else {
				$this->load_loginview();
			}
		}

		function permissionCheck(){
			if ($this->session->userdata('name') == '') {
				redirect('admin/login');
				exit();
			}
	        $user_type = $this->session->userdata('user_type');
	        $menu = $this->db->query("SELECT MenuID FROM usertyperoles WHERE UserTypeID = '".$user_type."'")->row()->MenuID;
	        $data = $this->db->query("SELECT slug FROM menu WHERE id IN (".$menu.")")->result();

	        $list = array();
	        if (!empty($data)) {
		        foreach ($data as $key => $value) {
		            $list[] = $value->slug;
		        }
		        array_push($list,'logout','login','SessionSetSideBar','SessionSetParentMenu','SessionSetChildMenu','profile');
	        }
	        $url = $this->uri->segment(2);
	        // p($url);
	        // pe($list);
	        if(!empty($url)){
	           	if (!in_array($url, $list)){
	            	echo "YOU DONT HAVE PERMISSION.<br>.<a href='".base_url()."admin'>dashboard</a>";
	              	exit();
	            }
	        }
	    }
		

		function SessionSetPostActiveLI() {
			if(isset($_POST['post_active'])) {
				$count_val = count(explode('_', $_POST['post_active']));
				if($count_val>1) {
					$_POST['post_active'] = explode('_', $_POST['post_active'])[1];
				}
			}

			$this->session->set_userdata('post_active',$_POST['post_active']);
			return json_encode("1");
			exit(0);
		}

		function SessionSetSideBar() {
			$sidebar = isset($_POST['length'])?$_POST['length']:NULL;
			$this->session->set_userdata('sidebar',$sidebar);
			return json_encode($_SESSION);
			exit(0);
		}

		function SessionSetChildMenu() {
			$menu = $_POST['menu_id'];
			$this->session->set_userdata('child_menu',$menu);
			return json_encode($menu);
			exit(0);
		}

		function SessionSetParentMenu() {
			$menu = $this->input->post('menu_id',TRUE);
			$this->session->set_userdata('parent_menu',$menu);
			return json_encode("1");
			exit(0);
		}


		function GetChildRecords($par){
			$data = null;
			foreach ($this->menu_data as $key => $value) {
				if($par==$value->parent_id) {
					$data[]=$value;
				}
			}
			return $data;
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
			
			if($this->input->post('login')) {  
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('err_login', 'Validation Failed');
					redirect('admin/login'); 
				} else {
					$username   = $this->input->post('username');
					$password   = md5($this->input->post('password'));
					if($this->login_check($username, $password)) {
							redirect('admin'); } else { 
							$this->session->set_flashdata('err_login', 'Invalid Login Credentials');
							redirect('admin/login');
					} //login check ends here
				} 
			}
		}

		function login_check($username, $password) {
			if($username == '' OR $password == '') return false;
			if( $this->session->userdata('username') && $this->session->userdata('username') == $username){ return true;}
			$query = $this->db->select('*')->where('username', $username)->where('password', $password)->get('user')->row();
			if ($query) {
				$user_data['name']      = $query->UserName;
				$user_data['username']  = $query->UserName;
				$user_data['userid']    = $query->UserId;
				$user_data['logged_in'] = true;
				$user_data['user_type'] = $query->UserType;
				$user_data['post_active'] = 0;
				$user_data['CreatedOn'] = $query->CreatedOn;
				$this->session->set_userdata($user_data);
				return true;

			} else { 
				return false; 
			}
		}

		function logout() {
			$this->session->sess_destroy();
			redirect('admin/login');
		}

		function load_loginview() {
			$data = array('SiteDetails' => $this->db->select('short_name,site_name')->get('settings')->row());
			$this->session->set_userdata('csrftoken', sha1(time()));
			$this->load->view('templates/admin/login',$data);
		}
		
		function auth_admin() {
			return ($this->session->userdata('username') != '' && $this->session->userdata('logged_in') == true) ? true : false;
		}
}
