<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mcontactus extends MY_Model{
    private $data = null;
    public $table_name = null;
    public $primary_key = null;
    public $sql = null;
    /**********************************Setup things from here ***************
    set table name,primary key and data
    ***********/
    function __construct(){
        parent::__construct();
        $this->table_name   = 'contactus';
        $this->primary_key  = 'id';
        $this->sql = "SELECT * FROM ".$this->table_name." where 1=1 ";
    }

    function SetDetails() {
        $this->data   = array(
            'address_en'    => $this->input->post('address_en'),
            'address_np'    => $this->input->post('address_np'),
            'longitude'    => $this->input->post('longitude'),
            'latitude'    => $this->input->post('latitude'),
            'phone'         => $this->input->post('phone'),
            'fax'           => $this->input->post('fax'),
            'email'         => $this->input->post('email'),
            'web'           => $this->input->post('web'),
            'facebook'      => $this->input->post('facebook'),
            'twitter'       => $this->input->post('twitter'),
            'googleplus'    => $this->input->post('googleplus'),
            'feed'          => $this->input->post('feed'),
            'youtube'       => $this->input->post('youtube'),
            'instagram'     => $this->input->post('instagram'),
            'webmail'       => $this->input->post('webmail'),
            'pobox'         => $this->input->post('pobox'),
            'map'           => $this->input->post('map'),
            'position'      => $this->input->post('position'),
            'manager_name'  => $this->input->post('manager_name'),
            'status'        => $this->input->post('status'),
            'head_office'   => $this->input->post('head_office'),
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

    function Save() {
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

    function GetCallback(){
        $data=$this->db->query("SELECT * FROM callback")->result();
        return $data;
    }

    function getContactList(){
        $sql = "SELECT C.*, B.name FROM contactus AS C 
                LEFT JOIN tbl_branch_type AS B ON B.id = C.head_office";
        $data = $this->db->query($sql)->result();
        return $data;
    }

    function getBranchTypeList(){
        $sql = "SELECT * FROM tbl_branch_type WHERE status = '1'";
        $data = $this->db->query($sql)->result();
        return $data;
    }
    
}