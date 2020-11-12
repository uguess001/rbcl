<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Musertype extends MY_Model{
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
                $this->table_name   = 'usertype';
                $this->primary_key  = 'UserTypeId';
                $this->sql = "select * from ".$this->table_name." WHERE 1=1 and Status='1'";
        }
        function SetDetails() {
            $this->data   = array(
            'Description'     => $this->input->post('Description')   
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
            $this->sql.="and ".$this->primary_key." = ".$key;
            // p($this->sql);
            return $this->ExecSingle();
          }
          return $this->Exec();
        }
        function Save() 
        {
            $this->SetDetails();
           // print_r(intval($this->input->post($this->primary_key))); exit(); 
            if($this->input->post($this->primary_key) && intval($this->input->post($this->primary_key)) && $this->input->post($this->primary_key) > 0) {
                $this->db->where($this->primary_key,$this->input->post($this->primary_key));
                 $this->db->update($this->table_name,$this->data);
                $this->saveUserTypeRoles(intval($this->input->post($this->primary_key))); 
            }else{
                //print_r($this->data); exit(); 
                if($this->db->insert($this->table_name,$this->data)) {
                        return $this->db->insert_id();    
                }
            }
        }
        function saveUserTypeRoles($UserTypeId){
           $this->db->where('UserTypeId',$UserTypeId);
           $num = $this->db->count_all_results('usertyperoles');
            $insertData['MenuID']       = implode(',', $this->input->post('menu'));
            $insertData['statusAdd']    =  null; //implode(',', $this->input->post('statusAdd'));
            $insertData['statusEdit']   =  null; //implode(',', $this->input->post('statusEdit'));
            $insertData['statusDelete'] =  null; //implode(',', $this->input->post('statusDelete'));
            $insertData['Status']       = 'Active';
           if($num>0){
                //update query
                $insertData['CreatedOn']       = date('YYYY-mm-dd');
                $this->db->where('UserTypeId',$UserTypeId);
                $this->db->update('usertyperoles',$insertData);
           }else{
                 $insertData['UserTypeId']       = $UserTypeId;
                 $insertData['ModifiedOn']       = date('YYYY-mm-dd');
                 $this->db->insert('usertyperoles',$insertData);
           }          
        }
        function GetAdminList($Offset,$Limit) { 
            $this->sql = "SELECT * FROM ".$this->table_name." WHERE 1=1 ";
            //row count before adding limit string
            $this->TotalRows = count($this->db->query($this->sql)->result());
            $this->sql.=" limit $Offset, $Limit";
            $result = $this->db->query($this->sql)->result();
            return $result;
        }
        function GetMenu() {
            $sql="SELECT * FROM menu 
                 WHERE parent_id IN (SELECT id FROM menu WHERE parent_id is NULL and show_menu=1) 
                 ORDER BY show_order ASC";
            $result = $this->db->query($sql)->result();
            return $result;
        }
        function GetMenuHeading() {
           $sql = "SELECT * FROM menu 
                   WHERE id in (SELECT id FROM menu WHERE parent_id is NULL and show_menu=1) 
                   ORDER BY show_order ASC";
            $result = $this->db->query($sql)->result();
            return $result;
        }
        function GetuserDescription($id) {
            $sql="SELECT * FROM usertype WHERE UserTypeId = '".$id."'";
            $result = $this->db->query($sql)->result();
            return $result;
        }
        function Deactivate($id) {
          $this->db->where('UserTypeId', $id)->delete('usertype'); 
          $this->db->where('UserTypeID', $id)->delete('usertyperoles'); 
        }
}
