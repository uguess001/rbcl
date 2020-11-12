<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mpublication extends MY_Model{
        private $data = null;
        public $table_name = null;
        public $primary_key = null;
        public $sql = null;
/**********************************Setup things from here ***************
                                  set table name,primary key and data
***********/        
        function __construct()
        {
                parent::__construct();
                $this->table_name   = 'publication';
                $this->primary_key  = 'id';

                $this->sql = "select * from ".$this->table_name." where 1=1 ";
        }

        function SetDetails() {
            $slug=trim(strtolower($this->input->post('title_en')));

            $slug= str_replace( array( '\'', '"', ',' , ';', '<', '>','&','(',')','@','=','#','%','{','}',':','[',']','|','^',
                '~','/','!' ,'*','$','\\'), '', $slug);

            $slug = str_replace(' ' , '-', $slug);

            $file1 = $this->upload_file();
            $userfile =  $this->input->post('userfile');
            $file1['file_name'] = $file1['file_name']?$file1['file_name']:$userfile;
            $file2 = $this->upload_file("image");
            $image_file =  $this->input->post('image_file');
            $file2['file_name'] = $file2['file_name']?$file2['file_name']:$image_file;
            $this->data   = array(
                'slug'               => $slug,
                'title_en'           => $this->input->post('title_en'),
                'title_np'           => $this->input->post('title_np'),
                'image'              => $file2['file_name'],
                'file'               => $file1['file_name'],
                'description_en'     => $this->input->post('description_en'),
                'description_np'     => $this->input->post('description_np'),
                'status'             => $this->input->post('status')
            ); 
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
      
        function Save() 
        {
            $this->SetDetails();
            if($this->input->post($this->primary_key) && intval($this->input->post($this->primary_key)) && $this->input->post($this->primary_key) > 0) {
                $this->data['ModifiedOn']=date('Y-m-d');
                $this->data['ModifiedBy']=$this->session->userdata('userid');
                $this->db->where($this->primary_key,$this->input->post($this->primary_key));
                return $this->db->update($this->table_name,$this->data);
            }
            $this->data['CreatedOn']=date('Y-m-d');
            $this->data['CreatedBy']=$this->session->userdata('userid');            
            return $this->db->insert($this->table_name,$this->data);
        }
        function upload_file($field='userfile') { 

            if( $this->upload->do_upload($field) )
            {
                $document_data = $this->upload->data();
                /**
                 * Rename File
                 * 
                 * rename file so that there is no space or any other illegal characters
                 */
                $image_prefix   = $this->generate_code(10);
                $new_image_name = $image_prefix . $document_data['file_ext'];
                rename($document_data['full_path'], $document_data['file_path'].$new_image_name);
                // update image data
                $document_data['full_path']    = $document_data['file_path'].$new_image_name;
                $document_data['file_name']    = $new_image_name;

                return $document_data;
            }
            $this->session->set_flashdata('_flash_msg', array(
                '_css_cls'  => 'error',
                '_message'  => $this->upload->display_errors()
            ));
            return false;
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

        function get_record(){
            $data=$this->db->query("select * from publication where status=1")->result();
            return $data;
        }
}
