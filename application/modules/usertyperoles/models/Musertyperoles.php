<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Musertyperoles extends MY_Model{
        private $data = null;
        public $table_name = null;
        public $primary_key = null;
        public $sql = null;
        public $primary_key_val = null;
/**********************************Setup things from here ***************
                                  set table name,primary key and data
***********/        
        function __construct()
        {
                parent::__construct();
                $this->table_name   = 'usertyperoles';
                $this->primary_key  = 'UserTypeRolesID';

                $this->sql = "select * from ".$this->table_name." where 1=1 ";
        }

        function SetDetails() {
            $this->data   = array(
                    'UserTypeID'     => $this->input->post('UserTypeID'),
                    'MenuID'     => $this->input->post('MenuID')
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
          //  print_r($key); exit(); 
            $this->sql.="and ".$this->primary_key." = ".$key;
            return $this->ExecSingle();
          }
          return $this->Exec();
        }
      
        function Save() 
        {
            $this->data['MenuID']=(!empty($_POST['menu']))?implode(',', $_POST['menu']):0;
            //$this->data['UserTypeID']=$this->primary_key_val;

            if($this->input->post($this->primary_key) && intval($this->input->post($this->primary_key)) && $this->input->post($this->primary_key) > 0) {
                $this->data['statusAdd']=(!empty($_POST['statusAdd']))?implode(',', $_POST['statusAdd']):0;;
                $this->data['statusEdit']=(!empty($_POST['statusEdit']))?implode(',', $_POST['statusEdit']):0;;
                $this->data['statusDelete']=(!empty($_POST['statusDelete']))?implode(',', $_POST['statusDelete']):0;
                $this->data['ModifiedOn']=date('Y-m-d');
                $this->data['ModifiedBy']=$this->session->userdata('userid');
                $this->data['UserTypeID']=$this->input->post($this->primary_key);  
                $this->db->where($this->primary_key,$this->input->post($this->primary_key));
               /* print_r($this->data);
                exit();*/
                return $this->db->update($this->table_name,$this->data); 
            }
                 $this->data['statusAdd']=(!empty($_POST['statusAdd']))?implode(',', $_POST['statusAdd']):0;;
                 $this->data['statusEdit']=(!empty($_POST['statusEdit']))?implode(',', $_POST['statusEdit']):0;;
                 $this->data['statusDelete']=(!empty($_POST['statusDelete']))?implode(',', $_POST['statusDelete']):0;
                 $this->data['UserTypeID']=$this->primary_key_val;
                 $this->data['Status']='Active';
                $this->data['CreatedOn']=date('Y-m-d');
                $this->data['CreatedBy']=$this->session->userdata('userid'); 
           /*echo "<pre>"; print_r($this->data);
            exit(); */          
            return $this->db->insert($this->table_name,$this->data);
        }
}
