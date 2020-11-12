<?php
class Admin extends Admin_Controller {

	function __construct(){
		parent::__construct();
		parent::index();
		$this->load->model('Mstaffs');
         $this->resource_path = realpath( APPPATH . '../uploads/staffs/' );
        $this->resource_path_url  = base_url() . 'uploads/staffs/';
        $this->_image_config = array(
                        'allowed_types' => 'gif|png|jpeg|jpg',
                        'upload_path'   =>  $this->resource_path,
                        'max_size'      =>  90000000,
                        'max_width'     => 132000,
                        'max_height'    => 40000
            );
        $this->load->library('upload', $this->_image_config);
        $this->table_name ='staffs';
        $this->PageLimit = 10;
	}

    function index() {
        $this->record('list');
    }

    function record($cipher='null') {
        $this->load->library('form_validation');
        if( $this->input->post('process') == 'true'){
            $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
            //Validating First Name Field
            $this->form_validation->set_rules('name_en', 'name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {

            }
            else {
                if($this->Mstaffs->Save()){
                    $this->session->set_flashdata('_flash_msg', array(
                        '_css_cls'  => 'success',
                        '_message'  =>
                        intval($this->Encryption->decode($cipher))?
                        'Successfully updated.':'Successfully added.'
                        ));
                    update_dop_user_log('has added '.$this->Mstaffs->table_name);
                }
                else{
                    $this->session->set_flashdata('_flash_msg', array(
                        '_css_cls'  => 'error',
                        '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                        ));
                }
                intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->Mstaffs->table_name, 'refresh'):
                redirect('admin/'.$this->Mstaffs->table_name.'/record/list', 'refresh');
                exit();
            }
        }
        if(isset($cipher) && intval($this->Encryption->decode($cipher))) {
            $data_content   =  array(
                'page_header'   => 'Add/Save records',
                'record'        => $this->Mstaffs->PickRecord($cipher)
                );
            $this->template->write_view('content', 'admin/form', $data_content, TRUE);
            $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="list") {
            $data=array(
                'records'    => $this->Mstaffs->PickRecord(),
            );
        $this->template->write_view('content', 'admin/report', $data, TRUE);
        $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="create"){
            $data_content = null;
            $this->template->write_view('content', 'admin/form', $data_content, TRUE);
            $this->template->add_js('application/resources/admin/plugins/ckeditor/ckeditor.js');
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="sorting") {
            if ($this->input->post('checkprocess',TRUE) == 'true') {
                $type_id = $this->input->post('designation_en',TRUE);
                $data = array (
                    'records'     => $this->Mstaffs->getStaffListByType($type_id)
                );
                $this->template->write_view('content', 'admin/list', $data, TRUE);
                $this->template->render();
            }
            elseif ($this->input->post('page_id_array')) {
                $post_array = $this->input->post('page_id_array');
                $type_id = $this->input->post('designation_en',TRUE);
                for ($i=0; $i < count($post_array); $i++) {
                    $this->db->set('group_order', $i);
                    $this->db->where('id',$post_array[$i]);
                    $this->db->where('designation_en',$type_id);
                    $this->db->update('staffs'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
                }
                echo 'Ordering has been updated';
                exit();
            }else{
                $data = array (
                    'records'     => $this->Mstaffs->getStaffListByType($typeid=2)
                );
                $this->template->write_view('content', 'admin/list', $data, TRUE);
                $this->template->render();
            }
        }elseif(isset($cipher) && $cipher=="branch") {
             if ($this->input->post()) {
                $post_array = $this->input->post('page_id_array');
                for ($i=0; $i < count($post_array); $i++) {
                    $this->db->set('group_order', $i);
                    $this->db->where('id',$post_array[$i]);
                    $this->db->where('designation_en','2');
                    $this->db->update('staffs'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
                }
                echo 'Ordering has been updated';
                exit();
            }
            $data = array (
                'records'    => $this->Mstaffs->getStaffListByType($typeid=2),
            );
            $this->template->write_view('content', 'admin/list', $data, TRUE);
            $this->template->render();
        }
        else{
            redirect(base_url().'admin','refresh');
        }
    }
    function delete($id){
        $id=$this->Encryption->decode($id);
        $this->db->where('id', $id);
        $this->db->delete('staffs');
        $this->session->set_flashdata('_flash_msg', array(
                        '_css_cls'  => 'success',
                        '_message'  => 'Successfully Deleted.'
                        ));
        redirect('admin/staffs/', 'refresh');
   }

}