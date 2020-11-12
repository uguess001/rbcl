<?php

class Admin extends Admin_Controller {

    

    function __construct()

    {

        parent::__construct();

        parent::index();

        $this->load->model('Msurveyor');

        $this->table_name ='tbl_surveyors';

        $this->PageLimit = 10;

        $this->resource_path = realpath(APPPATH . '../uploads/importExcel/');
        $this->resource_path_url = base_url() . 'uploads/importExcel/';

        $this->_image_config = array(
            'allowed_types' => 'pdf|doc|docx|txt|xls|xlsx|zip|rar|gif|png|jpeg|jpg',
            'upload_path' => $this->resource_path,
            'max_size' => 10240
        );
        $this->load->library('upload', $this->_image_config);

    }


    function uploadExcel(){
            if( 1){

                 $files_array = isset($_FILES['userfile'])?$_FILES['userfile']:NULL;
                        $file_arr = array();
                        if ( $_FILES) {
                           $document_data = $this->upload_file();
                           // print_r($document_data); die;

                        $this->importExcel($document_data['file_name']);

                        redirect('admin/surveyor');
                    }
            }
    }

 function importExcel($filename){
      // $file = FCPATH.'uploads/migration/heifier.xlsx';
      $file = FCPATH.'uploads/importExcel/' .$filename;

      $this->load->library('excel');

      $objPHPExcel = PHPExcel_IOFactory::load($file);



      //Iterating through all the sheets in the excel workbook and storing the array data
      foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
         $arrayData[$worksheet->getTitle()] = $worksheet->toArray();
      }




      foreach ($arrayData['Sheet2'] as $key => $value) {
         if($key>0){ 

              $data[]=array(
                       'title_en' =>$value[0],
                       'title_np'=>$value[1],
                       'code'=>$value[2],
                       'status'=>1,
                       'CreatedOn'=>date("Y-m-d"),
                       'CreatedBy'=>1
                       );
           }
      }
  
         // echo '<pre>';print_r($data);exit();


         if($this->db->insert_batch('tbl_surveyors',$data)){
           $this->session->set_flashdata('_flash_msg', array(
                                                        '_css_cls' => 'success',
                                                        '_message' => 'Successfully Inserted.'
                                                    ));
         }



         
      }











    function index() {

        $this->record('list');

    }



    function record($cipher='null') { 

        $this->load->library('form_validation');



        if( $this->input->post('process') == 'true' )

        {  

            $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

            $this->form_validation->set_rules('title_en', 'English Title', 'trim|required');
            $this->form_validation->set_rules('title_np', 'Neplai Title', 'trim|required');

            if ($this->form_validation->run() == FALSE) {}else{

            if(  $this->Msurveyor->Save() )

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'success',

                    '_message'  => 

                    intval($this->Encryption->decode($cipher))?

                    'Successfully updated.':'Successfully added.'

                    ));

                update_dop_user_log('has added '.$this->Msurveyor->table_name); 

            }

            else

            {

                $this->session->set_flashdata('_flash_msg', array(

                    '_css_cls'  => 'error',

                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'

                    ));

            }

            intval($this->Encryption->decode($cipher))?redirect('admin/surveyor', 'refresh'):

            redirect('admin/surveyor/record/list', 'refresh');

            exit();

        }

        }

        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {                  

            $data_content   =  array(

                'page_header'   => 'Add/Save records',

                'record'        => $this->Msurveyor->PickRecord($cipher)

                );

            $this->template->write_view('content', 'admin/form', $data_content, TRUE);

            $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');

            $this->template->render();

        }

        elseif(isset($cipher) && $cipher=="list") {

            $data=array(

                           'records'     => $this->Msurveyor->PickRecord()

            );

        $this->template->write_view('content', 'admin/report', $data, TRUE);

        $this->template->render();

        }                  

        elseif(isset($cipher) && $cipher=="create") 

        {  

          $data_content = null;

          $this->template->write_view('content', 'admin/form', $data_content, TRUE);

          $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');

          $this->template->render();

        }

        else{

            redirect(base_url().'admin','refresh');

        }

  }

  function delete($id){

    $id=$this->Encryption->decode($id);

    $this->db->where('id', $id);

    $this->db->delete('tbl_surveyors'); 
    $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 'Successfully Deleted.'
                    ));
    redirect('admin/surveyor/', 'refresh');

   }






   function upload_file() {
        if ($this->upload->do_upload()) {
            $document_data = $this->upload->data();

            /**
             * Rename File
             * 
             * rename file so that there is no space or any other illegal characters
             */
            $image_prefix = $this->generate_code(10);
            $new_image_name = $image_prefix . $document_data['file_ext'];
            rename($document_data['full_path'], $document_data['file_path'] . $new_image_name);
            // update image data
            $document_data['full_path'] = $document_data['file_path'] . $new_image_name;
            $document_data['file_name'] = $new_image_name;

            return $document_data;
        }
        $this->session->set_flashdata('_flash_msg', array(
            '_css_cls' => 'error',
            '_message' => $this->upload->display_errors()
        ));
        return false;
    }

    // ---------------------------------------------------------------------

    /**
     * Generate Code
     *
     * Generate a random code specified by the length
     *
     * @param   number $length
     * @return  string
     */
    function generate_code($length = 10) {

        if ($length <= 0) {
            return false;
        }

        $code = "";
        $today = date('ymdhis');
        $chars = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
        srand((double) microtime() * 1000000);
        for ($i = 0; $i < $length; $i++) {
            $code = $code . substr($chars, rand() % strlen($chars), 1);
        }
        return $code . $today;
    }


}