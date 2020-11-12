<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    function __construct(){
        parent::__construct();
        parent::index();
        $this->load->model('Mgalleryadmin');
        $this->url = 'gallery';
        $this->pagelimit = 15;
    }

    function index() {
        $this->record('list');
    }

    function record($cipher='null',$id='null') {

        if( $this->input->post('process') == 'true' ) {

             // var_dump('admin/'.$this->url.'/record/list');exit;
            if( $this->Mgalleryadmin->save()) {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  =>
                    intval($this->Encryption->decode($cipher))?
                    'Successfully updated.':'Successfully added.'
                    ));
                update_dop_user_log('has added '.$this->url);
            }
            else {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                    ));
            }



            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->url.'/record/list', 'refresh'):
            redirect('admin/'.$this->url.'/record/list', 'refresh');
            exit();
        }
        if(isset($cipher) && is_numeric($this->Encryption->decode($cipher)) ) {
            $id = $this->Encryption->decode($cipher);
            $list = $this->Mgalleryadmin->pickRecord($cipher);
            $picturelist = $this->Mgalleryadmin->getGalleryPictureImages($id);

            $data_content   =  array(
                'page_header'           => 'Add/Remove Pictures',
                'url'                   => $this->url,
                'record'                => $list,
                'picturelist' 	        => $picturelist,
                
            );

            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="list") {
            $offset = ($this->uri->segment(5) && intval($this->uri->segment(5)))?($this->uri->segment(5)):0;
            $result = $this->Mgalleryadmin->getAdminList($offset,$this->pagelimit);
            $total_rows = $this->Mgalleryadmin->getTotalCountAdminList();
            $base_url = base_url().'admin/'.$this->url.'/record/list/';
            $pagination = paginate($total_rows,$base_url,$this->pagelimit);

            $data = array(
                'page_header'               => 'Picture Gallery',
                'url'                       => $this->url,
                'list'                      => $result,
                'offset'                    => $offset,
                'pages'                     => $pagination,
            );

            $this->template->write_view('content', 'admin/report', $data, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="create") {
            $date = date('Y-m-d');
            $data_content = array(
                'page_header'           => 'Add Gallery Images',
                'url'                   => $this->url,
                'date'                  => $date,
            );
            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
            $this->template->render();
        }

        elseif(isset($cipher) && $cipher=="test") {
            $date = date('Y-m-d');
            $data_content = array(
                'page_header'           => 'Add Gallery Images',
                'url'                   => $this->url,
                'date'                  => $date,
            );
            $this->template->write_view('content', 'admin/test', $data_content, TRUE);
            $this->template->render();
        }


        elseif(isset($cipher) && $cipher=="deactivate" && isset($id)) {
            $id = $this->Encryption->decode($id);
            $this->deactivate($id);
            redirect('admin/'.$this->url.'/record/list', 'refresh');
        }
        else{
            redirect('admin/'.$this->url.'/record/list','refresh');
        }

    }

    function deactivate($id) {

        $data_content   =  array(
                'page_header'   => 'Delete Records',
                'record'        => $this->Mgalleryadmin->deactivate($id)
                );
        return true;

    }


    public function upload_file()
    {
        if ($this->upload->do_upload('file')) {
            $document_data = $this->upload->data();
            ///print_r($document_data);exit();
            /**
             * Rename File
             *
             * rename file so that there is no space or any other illegal characters
             */
            $image_prefix   = md5(uniqid(mt_rand()));
            $new_image_name = $image_prefix . $document_data['file_ext'];
            rename($document_data['full_path'], $document_data['file_path'] . $new_image_name);
            // update image data
            $document_data['full_path'] = $document_data['file_path'] . $new_image_name;
            $document_data['file_name'] = $new_image_name;

            return $document_data;
        }
        
        return false;
    }

    public function do_upload() {
 
       $config=array();    
        $upload_path_url = base_url(). 'uploads/gallery/';
        $config['upload_path'] = './uploads/gallery/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10240';
     

        $this->load->library('upload', $config);

       
        
        $upload=$this->upload_file();
        if (!$upload) {
            

             echo json_encode(array('status'=>'error','message'=>$this->upload->display_errors()));exit;
            // $this->load->view('upload', $error);
            // $existingFiles = get_dir_file_info($config['upload_path']);
            // $foundFiles = array();
            // $f=0;
            // foreach ($existingFiles as $fileName => $info) {
            //   if($fileName!='thumbs'){//Skip over thumbs directory
            //     //set the data for the json array
            //     $foundFiles[$f]['name'] = $fileName;
            //     $foundFiles[$f]['size'] = $info['size'];
            //     $foundFiles[$f]['url'] = $upload_path_url . $fileName;
            //     $foundFiles[$f]['thumbnailUrl'] = $upload_path_url.$fileName;
            //     $foundFiles[$f]['deleteUrl'] = base_url() . 'admin/gallery/deleteImage/' . $fileName;
            //     $foundFiles[$f]['deleteType'] = 'DELETE';
            //     $foundFiles[$f]['error'] = null;

            //     $f++;
            //   }
            // }
            // $this->output
            // ->set_content_type('application/json')
            // ->set_output(json_encode(array('files' => $foundFiles)));
         } else{

             echo json_encode(array('status'=>'success','message'=>$upload,'title'=>($upload['client_name'])));exit;
            // $gallery_data = array(
            //             'gallery_id' => $this->input->post('gallery_id'),
            //             'title_en' => $upload['client_name'],
            //             'image' => $upload['file_name']
            //             );
            // if($this->db->insert('tbl_gallery_images',$gallery_data)){
            //  echo json_encode(array('status'=>'success','message'=>$upload));exit;
            // }else{

            //    echo json_encode(array('status'=>'error','message'=>'Unable to save in database'));exit; 
            // }
         }
         //else {
        //     $data = $this->upload->data('length');

        //     $config = array();
        //     $config['image_library'] = 'gd2';
        //     $config['source_image'] = $data['full_path'];
        //     $config['create_thumb'] = TRUE;
        //     $config['new_image'] = $data['file_path'] . 'thumbs/';
        //     $config['maintain_ratio'] = TRUE;
        //     $config['thumb_marker'] = '';
        //     $config['width'] = 75;
        //     $config['height'] = 50;
        //     $this->load->library('image_lib', $config);
        //     $this->image_lib->resize();


        //     $info = new StdClass;
        //     $info->name = $data['file_name'];
        //     $info->size = $data['file_size'] * 1024;
        //     $info->type = $data['file_type'];
        //     $info->url = $upload_path_url . $data['file_name'];

        //     $info->thumbnailUrl = $upload_path_url.$data['file_name'];
        //     $info->deleteUrl = base_url().'admin/gallery/deleteImage/'.$data['file_name'];
        //     $info->deleteType = 'DELETE';
        //     $info->error = null;

        //     $files[] = $info;
        //         echo json_encode(array("files" => $files));
        // }
        
    }

    public function deleteImage($file) {//gets the job done but you might want to add error checking and security
        $success = unlink(FCPATH.'uploads/gallery/'.$file);
        $success = unlink(FCPATH.'uploads/gallery/'.$file);
        //info to see if it is doing what it is supposed to
    	$info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url().'uploads/gallery/'.$file;
        $info->file = is_file(FCPATH.'uploads/gallery/'.$file);
        echo json_encode(array($info));
    }

}