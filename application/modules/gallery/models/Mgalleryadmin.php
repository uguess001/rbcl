<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mgalleryadmin extends MY_Model{
        private $data = null;
        public $table_name = null;
        public $galleryimages = null;
        public $primary_key = null;
/**********************************Setup things from here ***************
                                  set table name,primary key and data
***********/
        function __construct(){
            parent::__construct();
            $this->table_name   = 'tbl_gallery';
            $this->galleryimages   = 'tbl_gallery_images';
            $this->primary_key  = 'id';

            $this->resource_path = realpath( APPPATH . '../uploads/gallery/' );
            $this->_image_config = array(
                            'allowed_types' => 'pdf|doc|docx|txt|gif|png|jpeg|jpg',
                            'upload_path'   => $this->resource_path,
                            'max_size'      => 90000000,
                            'max_width'     => 132000,
                            'max_height'    => 40000
                );
            $this->load->library('upload', $this->_image_config);
        }

        function setDetails() {
            
            $upload_image =  $this->upload_file('imagefile');
            if(!  $upload_image){

               // echo 'not upload';exit;
            }
            $image_file =  $this->input->post('image_file', TRUE);
            $upload_image['file_name'] = $upload_image['file_name']?$upload_image['file_name']:$image_file;

            $this->data  =   array(
                'title_en'                      => $this->input->post('title_en', TRUE),
                'title_np'                      => $this->input->post('title_np', TRUE),            
                //'image'                         => $upload_image['file_name'],
                'image'                         => $this->input->post('image'),
                'published_date'                => $this->input->post('published_date', TRUE),
                'status'                        => $this->input->post('status', TRUE),
                'created_by'                => ($this->session->userdata('userid')),

            );
        }

        function setPictures() {
            //Merge Posted Title With Photo.................    
            $images = array();
            $image = $this->input->post('img_name', TRUE);
            if(!empty($image)){
                foreach($image as $key => $val){ 
                    $val2 = $this->input->post('img_title')[$key]; 
                    $images[$key]['name'] = $val; 
                    $images[$key]['title'] = str_replace('_', ' ', $val2); 
                }
            }
            return $images;
        }
/**********************************Setup things upto here **************************/

       function exec() {
            $result = $this->db->get($this->table_name)->result();
            return $result;
        }

        function pickRecord($key=null) {
            if($key !=null) {
                $result = $this->db->where($this->primary_key, $this->Encryption->decode($key))
                                    ->get($this->table_name)
                                    ->row();
                return $result;
            }
            return $this->exec();
        }

        function save() {
            $this->setDetails();
                     $post_primarykey = $this->input->post($this->primary_key, TRUE);
            if($post_primarykey && intval($post_primarykey) && $post_primarykey > 0) {
                $this->db->where($this->primary_key,$post_primarykey);
                $gallerySave=$this->db->update($this->table_name,$this->data);
                $images = $this->SetPictures();
                $this->db->where('gallery_id', $post_primarykey )->delete($this->galleryimages);
                if($images ){
                    
                    foreach ($images as $key => $value) {
                        $this->data1 = array(
                                'gallery_id'        => $post_primarykey,
                                'title_en'          => $value['title'],
                                'image'             => $value['name']
                        );
                        $this->db->insert($this->galleryimages,$this->data1);
                    }
                     return $this->db->insert_id();
                }else{

                return  $gallerySave;
                }
               
            }


             $this->data['created_on']=date('Y-m-d h:i:s');
            $gallerySave= $this->db->insert($this->table_name,$this->data);
            $insert_id = $this->db->insert_id();
            $images = $this->setPictures();
            if($images ){
                foreach ($images as $key => $value) {
                    $this->images = array(
                            'gallery_id'        => $insert_id,
                            'title_en'          => $value['title'],
                            'image'             => $value['name']
                        );
                    $this->db->insert($this->galleryimages,$this->images);
                }
                return $this->db->insert_id();
            } else{

                return  $gallerySave;
            }   
            
        }

        function deactivate($id) {
           $this->db->where($this->primary_key, $id);
           $this->db->delete($this->table_name);
        }

        function getAdminList($offset,$limit) {
            $result = $this->db->order_by('published_date', 'DESC')
                                ->limit($limit, $offset)
                                ->get($this->table_name)
                                ->result();
            return $result;
        }

        function getTotalCountAdminList() {
            $result = $this->db->order_by('published_date', 'DESC')
                                ->get($this->table_name)
                                ->num_rows();
            return $result;
        }

        function getGalleryPictureImages($id){
            $result = $this->db->where('gallery_id', $id)
                                ->get($this->galleryimages)
                                ->result();
            return $result;
        }

        function upload_file($field='userfile') {
            if( $this->upload->do_upload($field) ){
                $document_data = $this->upload->data();
                /**
                 * Rename File
                 *
                 * rename file so that there is no space or any other illegal characters
                 */
                $image_prefix = generate_code(10);
                $new_image_name = $image_prefix . $document_data['file_ext'];
                rename($document_data['full_path'], $document_data['file_path'].$new_image_name);
                // update image data
                $document_data['full_path'] = $document_data['file_path'].$new_image_name;
                $document_data['file_name'] = $new_image_name;
                $config=array();
                $config['image_library'] = 'gd2';
                $config['source_image'] = realpath( APPPATH . '../uploads/gallery/' ).'/'.$new_image_name;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                //$config['width']         = 250;
                $config['height']       = 250;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                if ( ! $this->image_lib->resize())
                {               echo $config['source_image'];
                        echo $this->image_lib->display_errors();exit;
                }

                return $document_data;
            }
            $this->session->set_flashdata('_flash_msg', array(
                                            '_css_cls'  => 'error',
                                            '_message'  => $this->upload->display_errors()
                                    ));
            return false;
        }

        

}
