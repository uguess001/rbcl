<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mprofileadmin extends MY_Model{
        private $data = null;
        private $datawithpwd = null;
        public $table_name = null;
        public $primary_key = null;
/**********************************Setup things from here ***************
                                  set table name,primary key and data
***********/
        function __construct(){
            parent::__construct();
            $this->table_name   = 'user';
            $this->primary_key  = 'UserId';
        }

        function setDetails() {
            $username = $this->input->post('username', TRUE);
            $changepwd = $this->input->post('changepwd', TRUE);
            $password = md5($this->input->post('newpassword', TRUE));

            $this->data  =   array(
                'UserName'                 => $username,
            );

            $this->datawithpwd  =   array(
                'UserName'                 => $username,
                'Password'                 => $password,
            );
        }
/**********************************Setup things upto here **************************/

       function exec() {
            $result = $this->db->get($this->table_name)->result();
            return $result;
        }

        function pickRecord($key=null) {
            if($key !=null) {
                $result = $this->db->where($this->primary_key, $this->Encryption->decode($key))
                                    ->get($this->table_name)
                                    ->row();
                return $result;
            }
            return $this->exec();
        }

        function save() {
            $this->setDetails();
            $post_primarykey = $this->input->post($this->primary_key, TRUE);
            if($post_primarykey && intval($post_primarykey) && $post_primarykey > 0) {
                $this->db->where($this->primary_key,$post_primarykey);

                $changepwd = $this->input->post('changepwd', TRUE);
                if ($changepwd != '') {
                    return $this->db->update($this->table_name,$this->datawithpwd);
                } else {
                    return $this->db->update($this->table_name,$this->data);                    
                }

            }
            return $this->db->insert($this->table_name,$this->data);
        }

        function deactivate($id) {
           $this->db->where($this->primary_key, $id);
           $this->db->delete($this->table_name);
        }

        function getProfileView($userid) {
        	$result = $this->db->where($this->primary_key, $userid)
            				->get($this->table_name)
            				->row();
            return $result;
        }

        function getadminList() {
            $result = $this->db->get($this->table_name)
                                ->result();
            return $result;
        }

        function checkOldPassword($userid, $password){
            $result = $this->db->select('UserName')
                            ->where($this->primary_key, $userid)
                            ->where('Password', $password)
                            ->get($this->table_name)
                            ->row();
            return $result;
        }






}
