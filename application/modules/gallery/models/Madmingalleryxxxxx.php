<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Madmingallery extends MY_Model{
        private $data = null;
        private $data1 = null;
        public $gallery_table_name = null;
        public $pictures_table_name = null;
        public $primary_key = null;
        public $sql = null;        
        var $TotalRows;
/**********************************Setup things from here ***************
                                  set table name,primary key and data
***********/        
        function __construct()
        {
                parent::__construct();
                $this->gallery_table_name   = 'tbl_gallery';
                $this->pictures_table_name   = 'tbl_gallery_images';
                $this->primary_key  = 'id';

                $this->sql = "select * from ".$this->gallery_table_name." where 1=1 ";
                $this->TotalRows = 0;

            $config['upload_path'] = realpath( APPPATH . '../uploads/gallery/');
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size']    = 102400;
	        $config['max_width']  = 30720;
	        $config['max_height']  = 10240;
			$this->load->library('upload', $config);
        }

        function SetDetails() {


            if($_FILES['Featured']['size'] > 0){
    			$File = $_FILES['Featured'];
    			$_FILES['Featured']['name']= $File['name'];
		        $_FILES['Featured']['type']    = $File['type'];
		        $_FILES['Featured']['tmp_name'] = $File['tmp_name'];
		        $_FILES['Featured']['error']       = $File['error'];
		        $_FILES['Featured']['size']    = $File['size']; 

		        if(!$this->upload->do_upload('Featured')){
						$errors = $this->upload->display_errors();
						echo 'Error Uploading Image';
						echo $errors;
					} else {
						$document_data = $this->upload->data();
		                $image_prefix   = $this->generate_code(10);
		                $new_image_name = $image_prefix . $document_data['file_ext'];
		                rename($document_data['full_path'], $document_data['file_path'].$new_image_name);
		                // update image data
		                $document_data['full_path']    = $document_data['file_path'].$new_image_name;
		                $document_data['file_name']    = $new_image_name;
					}
                }

                $new_image_name = !empty($document_data['file_name'])?$document_data['file_name']:$_POST['featured_file'];

            $this->data   = array(
                    'title_en'           => $this->input->post('title_en'),
                    'Featured'                => $new_image_name
            );
        }

    function SetPictures() {
       //Merge Posted Title With Photo.................    
		$images = array();
        if(isset($_POST['img_name']) && count($_POST['img_name']) > 0 ){
		foreach($_POST['img_name'] as $key=>$val){ 
		    $val2 = $_POST['img_title'][$key]; 
		    $images[$key]['name'] = $val; 
		    $images[$key]['title'] = $val2; 
		}
    }
		 return $images;
    }
/**********************************Setup things upto here **************************/        

        function Exec() {
          return $this->db->query($this->sql)->result();
        }
        function ExecSingle() {
          return $this->db->query($this->sql)->row();
        }        
        function PickRecord($key=null) {
          if($key !=null) {
            $this->sql.="and ".$this->primary_key." = ".$this->Encryption->decode($key);
            return $this->ExecSingle();
          }
          return $this->Exec();
        }

        function Save() {
               var_dump('asas');exit;
        	$this->SetDetails();



            if($this->input->post($this->primary_key) && intval($this->input->post($this->primary_key)) && $this->input->post($this->primary_key) > 0) {
                $id = $this->input->post($this->primary_key);
                // $this->data['ModifedOn']=date('Y-m-d');
                // $this->data['ModifiedBy']=$this->session->userdata('userid');
                $this->db->where($this->primary_key,$this->input->post($this->primary_key));
                $this->db->update($this->gallery_table_name,$this->data);
                $images = $this->SetPictures();
                if(count($images) >0 ){
                $this->db->where('gallery_id', $id )->delete('tbl_gallery_images');
                foreach ($images as $key => $value) {
                	$this->data1 = array(
                		'gallery_id' => $id,
                		'title_en' => $value['title'],
                		'Name' => $value['name']
                		);
	                $this->db->insert($this->pictures_table_name,$this->data1);
                    }
                }
            	return $this->db->insert_id();
            }
            // $this->data['CreatedOn']=date('Y-m-d');
            // $this->data['CreatedBy']=$this->session->userdata('userid');            
            $this->db->insert($this->gallery_table_name,$this->data);
            $insert_id = $this->db->insert_id();
            $images = $this->SetPictures();
            if(count($images) >0 ){
                foreach ($images as $key => $value) {
                	$this->data1 = array(
                		'gallery_id' => $insert_id,
                		'title_en' => $value['title'],
                		'Name' => $value['name']
                		);
                $this->db->insert($this->pictures_table_name,$this->data1);
                }
            }    
            return $this->db->insert_id();
        }

        function Deactivate($id) {
           $this->db->where('ID', $id);
           $this->db->delete($this->gallery_table_name ); 
        }

        function GetPictureList($id)
        {
        	//$id = decrypt($id);
           $id= $this->Encryption->decode($id);
            $sql ="SELECT gp.id as PID, gp.title_en, gp.Name
                    FROM tbl_gallery_images gp
                    WHERE 
                    gp.gallery_id = '".$id."'";
            $result = $this->db->query($sql)->result();
            return $result;
        }

        function GetAdminList($Offset,$Limit) {   

            $sql = "SELECT * FROM ".$this->gallery_table_name." where 1=1";
            $this->TotalRows = count($this->db->query($sql)->result());
            $sql.=" limit $Offset, $Limit";
            $result = $this->db->query($sql)->result();
            return $result;
        }


        function generate_code($length = 10) {

            if ($length <= 0) {
                return false;
            }

            $code = "";
            $today = date('ymdhis');
            $chars = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
            srand((double)microtime() * 1000000);

            for ($i = 0; $i < $length; $i++) {
                $code = $code . substr($chars, rand() % strlen($chars), 1);
            }

            return $code.$today;
        }		
}
