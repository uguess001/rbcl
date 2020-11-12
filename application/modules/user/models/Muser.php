<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Muser extends MY_Model{
        private $data = null;
        public  $table_name = null;
        public  $primary_key = null;
        public  $sql = null;
/**********************************Setup things from here ***************
                                  set table name,primary key and data
***********/        
        function __construct()
        {
                parent::__construct();
                $this->table_name   = 'user';

                $this->primary_key  = 'UserId';
                $this->sql = "select * from ".$this->table_name." where 1=1  ";
             
        }

        function SetDetails() {
            if($this->input->post()) {
                  $this->data   = array(
                                        //'name'         => $this->input->post('fullname'),
                                        'UserType'     => $this->input->post('UserType'),
                                        'Status'       => $this->input->post('Status'),
                                        
                                  );


            }
        }
/**********************************Setup things upto here **************************/        

        function Exec() {
          //$this->sql = $this->sql." order UserType";
          return $this->db->query($this->sql)->result();
        }
        function ExecSingle() {
          return $this->db->query($this->sql)->row();
        }        
        function CheckDuplicate(){
            if($this->input->post('UserName')) {
                $this->sql =$this->sql." and username = '".$this->input->post('UserName')."'";
                return (count($this->Exec())>0)?  FALSE: TRUE;
            }
            return TRUE;
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

                $this->data['ModifiedOn'] = date('Y-m-d');
                $this->data['ModifiedBy'] = $this->session->userdata('userid');
                if($this->input->post('change_password')) {
                    $this->data['Password'] =   md5($this->input->post('Password'));    
                }

                $this->db->where($this->primary_key,$this->input->post($this->primary_key));
                return $this->db->update($this->table_name,$this->data);
            }




                    $this->data['Password'] =   md5($this->input->post('Password'));
					$this->data['CreatedOn'] = date('Y-m-d');
					$this->data['CreatedBy'] = $this->session->userdata('userid');
					$this->data['UserName'] = $this->input->post('UserName');
					return $this->db->insert($this->table_name,$this->data);
					
						
        }
            
}

                       

        

