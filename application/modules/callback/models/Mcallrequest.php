<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcallrequest extends MY_Model{

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

                $this->table_name   = 'tbl_request_callback';

                $this->primary_key  = 'id';



                $this->sql = "select * from ".$this->table_name." where 1=1 ";

        }



/**********************************Setup things upto here **************************/        



        function Exec() {
            $this->sql.="order by id desc";
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

        //For contact information request by the clients

        function getContactInformation(){
            $data = $this->db->query('SELECT * FROM tbl_request_contact order by id desc')->result();

            return $data;
        }

}

