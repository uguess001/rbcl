<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
    public $table_name = null;

    function __construct() {
        parent::__construct();
        parent::index();
        $this->table_name ='tbl_menu';
        $this->PageLimit = 10;
    }

    function index() {
        $result = $this->db->order_by('sort', 'ASC')->get($this->table_name)->result();
        $data = array (
           'list'               => $result,
           'page_header'        => 'Menu Management',
        );
        $this->template->write_view('content', 'admin/report', $data, TRUE);
        $this->template->render();
    }

    function saveMenu(){
        if($this->input->post('process') == 'true') {
            $label_en = $this->input->post('label_en', TRUE);
            $label_np = $this->input->post('label_np', TRUE);
            $link = $this->input->post('link', TRUE);
            $status = $this->input->post('status', TRUE);
            if($this->input->post('id') != '') {
                // update
                $id = $this->input->post('id', TRUE);
                $data  =   array(
                    'label_en'         => $label_en,
                    'label_np'         => $label_np,
                    'link'              => $link,
                    'status'              => $status,
                );
                $this->db->where('id',$id)->update($this->table_name,$data);
                $result = array(
                    'type'              => 'edit',
                    'label_en'          => $label_en,
                    'label_np'          => $label_np,
                    'link'              => $link,
                    'status'              => $status,
                    'id'                => $id,
                );
                echo json_encode($result);
                exit();
            }
            else {
                // insert
                $data  =   array(
                    'label_en'          => $label_en,
                    'label_np'          => $label_np,
                    'link'              => $link,
                    'status'              => $status,
                );
                $this->db->insert($this->table_name,$data);
                $insertid = $this->db->insert_id();

                $result = array(
                    'type'       => 'add',
                    'menu'       => '<li class="dd-item dd3-item" data-id="'.$insertid.'" >
                                    <div class="dd-handle dd3-handle">Drag</div>
                                    <div class="dd3-content"><span id="label_show'.$insertid.'">'.$label_en.' / '.$label_np.'</span>
                                        <span class="span-right">/<span id="link_show'.$insertid.'">'.$link.'</span> &nbsp;&nbsp;
                                            <a class="edit-button" id="'.$insertid.'" label_en="'.$label_en.'" link="'.$link.'" ><i class="fa fa-pencil"></i></a>
                                            <a class="del-button" id="'.$insertid.'"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </div>',
                );
                echo json_encode($result);
                exit();
            }
        } else {
            $result = array(
                'error'         => 'true',
                'message'       => 'Please Try again',
            );
            echo json_encode($result);
            exit();
        }
    }

    function updateDataList(){
        if($this->input->post()) {
            $jsondata = $this->input->post('data');
            $data = json_decode($jsondata);
            $readbleArray = $this->parseJsonArray($data);
            foreach ($readbleArray as $key => $val) {
                $data = array(
                    'parent'    => $val['parentID'],
                    'sort'      => $key,
                );

                $this->db->where('id', $val['id']);
                $this->db->update($this->table_name, $data);
            }
            $result = array(
                'error'         => 'false',
                'message'       => 'success',
            );
            echo json_encode($result);
            exit();
        } else {
            $result = array(
                'error'         => 'true',
                'message'       => 'Please Try again',
            );
            echo json_encode($result);
            exit();
        }
    }

    function parseJsonArray($jsonArray, $parentID = 0) {
        $return = array();
        foreach ($jsonArray as $subArray) {
            $returnSubSubArray = array();
            if (isset($subArray->children)) {
                $returnSubSubArray = $this->parseJsonArray($subArray->children, $subArray->id);
            }
            $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
            $return = array_merge($return, $returnSubSubArray);
        }
        return $return;
    }

    function deleteMenu(){
        if($this->input->post()) {
            $this->recursiveDelete($this->input->post('id',TRUE));
            $result = array(
                'error'         => 'false',
                'message'       => 'success',
            );
            echo json_encode($result);
            exit();
        } else {
            $result = array(
                'error'         => 'true',
                'message'       => 'Please Try again',
            );
            echo json_encode($result);
            exit();
        }
    }

    function recursiveDelete($id) {
        $result = $this->db->order_by('sort', 'ASC')->where('parent', $id)->get($this->table_name)->result();
        if (!empty($result)) {
            foreach ($result as $k => $val) {
                $this->recursiveDelete($val->id);
            }
        }
        $this->db->where('id', $id)->delete($this->table_name);        
    }

    function getLink(){
        if($this->input->post('module')=='pages'){
                 $sql = "select * from pages order by id desc";
            if ($this->db->query($sql)->result()){
                $data['list']=$this->db->query($sql)->result();

                $data['status']='Success';
            }
            else $data['status']='Failed';
            echo json_encode($data) ;
        }
            else{
                $sql = "select * from services order by id desc";
            if ($this->db->query($sql)->result()){
                $data['list']=$this->db->query($sql)->result();

                $data['status']='Success';
            }
            else $data['status']='Failed';
            echo json_encode($data) ;
         }
    }
    
}