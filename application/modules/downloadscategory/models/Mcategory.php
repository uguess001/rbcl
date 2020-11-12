<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcategory extends MY_Model{

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

                $this->table_name   = 'tbl_download_category';

                $this->primary_key  = 'id';



                $this->sql = "select * from ".$this->table_name." where 1=1 ";

        }



        function SetDetails() {


            $this->data   = array(

                'title_en'     => $this->input->post('title_en'),

                'title_np'     => $this->input->post('title_np'),

                'status'     => $this->input->post('status')

            ); 

                        // print_r($this->data );exit();

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

      

        function Save() 

        {

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

        function generate_code($length = 10) {

            if ($length <= 0) {

                return false;

            }



            $code = "";

            $today = date('ymdhis');

            $chars = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";

            srand((double)microtime() * 1000000);



            for ($i = 0; $i < $length; $i++) {

                $code = $code . substr($chars, rand() % strlen($chars), 1);

            }



            return $code.$today;

        }



        function get_record(){

            $data=$this->db->query("select * from services where status=1")->result();

            return $data;

        }

}

