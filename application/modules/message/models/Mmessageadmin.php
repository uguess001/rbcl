<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mmessageadmin extends MY_Model{
        private $data = null;
        public $table_name = null;
        public $primary_key = null;
/**********************************Setup things from here ***************
                                  set table name,primary key and data
***********/
        function __construct(){
            parent::__construct();
            $this->table_name   = 'tbl_message';
            $this->primary_key  = 'id';
        }

        function setDetails() {
            $this->data  =   array(
                'title'                 => $this->input->post('title', TRUE),
                'description'           => $this->input->post('description', TRUE),
                'published_date'        => $this->input->post('published_date', TRUE),
                'file'                  => $this->input->post('file', TRUE),
                'status'                => $this->input->post('status', TRUE),
                'created_by'            => $this->session->userdata('userid'),
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
                // update
                $insert_id = $this->input->post($this->primary_key);                
                $this->db->where('message_id', $insert_id)->delete('tbl_message_assigned');

                $final = array();
                  $userList=$this->input->post('userlist');
            	if (!empty($userList)) {
                    foreach ($this->input->post('userlist') as $value) {
                        $final[] = array(
                            'message_id'    => $insert_id,
                            'user_id'       => $value,
                            'status'        => '0',
                        );
                    }
                }

                $this->db->insert_batch('tbl_message_assigned',$final);
                return $this->db->where($this->primary_key,$post_primarykey)->update($this->table_name,$this->data);
            }
            // insert
            $this->db->insert($this->table_name,$this->data);
            $insert_id = $this->db->insert_id();
            $final = array();
            $userList=$this->input->post('userlist');
            if (!empty($userList)) {
                foreach ($this->input->post('userlist') as $value) {
                    $final[] = array(
                        'message_id'    => $insert_id,
                        'user_id'       => $value,
                        'status'        => '0',
                    );
                }
            }
            if (!empty($final)) {
                $this->db->insert_batch('tbl_message_assigned',$final);
            }
            return true;
        }

        function deactivate($id) {
           $this->db->where($this->primary_key, $id);
           $this->db->delete($this->table_name);
        }

        function getAdminInboxList($offset,$limit) {
            $result = $this->db->select('M.*, MA.status AS seenstatus, U.UserName AS username')
                                ->join('tbl_message_assigned AS MA','MA.message_id = M.id')
                                ->join('user AS U','M.created_by = U.UserId')
                                ->where('MA.user_id',$this->session->userdata('userid'))
                                ->order_by('published_date', 'DESC')
                                ->limit($limit, $offset)
                                ->get($this->table_name.' AS M')
                                ->result();

            /*if ($this->session->userdata('user_type') != '1') {
                $result = $this->db->select('M.*, MA.status AS seenstatus')
                                ->join('tbl_message_assigned AS MA','MA.message_id = M.id')
                                ->where('MA.user_id',$this->session->userdata('userid'))
                                ->order_by('published_date', 'DESC')
                                ->limit($limit, $offset)
                                ->get($this->table_name.' AS M')
                                ->result();
            } else {
                 $result = $this->db->order_by('published_date', 'DESC')
                                ->limit($limit, $offset)
                                ->get($this->table_name.' AS M')
                                ->result();
            }*/
            return $result;
        }

        function getTotalCountAdminInboxList() {
            $result = $this->db->select('M.*, MA.status AS seenstatus')
                            ->join('tbl_message_assigned AS MA','MA.message_id = M.id')
                            ->where('MA.user_id',$this->session->userdata('userid'))
                            ->order_by('published_date', 'DESC')
                            ->get($this->table_name.' AS M')
                            ->num_rows();
            /*if ($this->session->userdata('user_type') != '1') {
            } else {
                 $result = $this->db->order_by('published_date', 'DESC')
                                ->get($this->table_name.' AS M')
                                ->num_rows();
            }*/
            return $result;
        }

        function getAdminSendList($offset,$limit){
            $result = $this->db->select('id,title,file,status,published_date')
                            ->where('created_by',$this->session->userdata('userid'))
                            ->order_by('published_date', 'DESC')
                            ->get($this->table_name)
                            ->result();
            return $result;
        }

        function getTotalCountAdminSendList() {
            $result = $this->db->select('M.*, MA.status AS seenstatus')
                            ->join('tbl_message_assigned AS MA','MA.message_id = M.id')
                            ->where('MA.user_id',$this->session->userdata('userid'))
                            ->order_by('published_date', 'DESC')
                            ->get($this->table_name.' AS M')
                            ->num_rows();
            /*if ($this->session->userdata('user_type') != '1') {
            } else {
                 $result = $this->db->order_by('published_date', 'DESC')
                                ->get($this->table_name.' AS M')
                                ->num_rows();
            }*/
            return $result;
        }


        function getUserList(){
            $userid = $this->session->userdata('userid');
            $result = $this->db->select('U.UserName, U.UserId, UT.Description')
                                ->join('usertype AS UT','UT.UserTypeId = U.UserType')
                                ->where('U.UserId != ',$userid)
                                ->order_by('UserType', 'asc')
                                ->get('user AS U')
                                ->result();
            return $result;
        }

        function getUserCheckedList($messageid){
            $result = $this->db->select('*')
                                ->get('tbl_message_assigned')
                                ->result();
            return $result;
        }

        function getUserCheckedListDetail($messageid){
            $result = $this->db->select('*')
                                ->get('tbl_message_assigned')
                                ->result();
            return $result;
        }

        function updateViewedStatus($message_id,$userid){
            $data = array('status' => '1');

            return $this->db->where('message_id', $message_id)
                            ->where('user_id', $userid)
                            ->update('tbl_message_assigned', $data);
        }

        function getInboxCount(){
            $userid = $this->session->userdata('userid');
            $result = $this->db->select('*')
                            ->where('user_id', $userid)
                            ->where('status', '0')
                            ->get('tbl_message_assigned')
                            ->num_rows();
            return $result;
        }

        function getMessageDetail($message_id){
            $result = $this->db->select('M.*, U.UserName AS username')
                                ->join('user AS U','M.created_by = U.UserId')
                                ->where('M.id',$message_id)
                                ->get($this->table_name.' AS M')
                                ->row();
            return $result;
        }

        function getMessageViewList($message_id){
            $result = $this->db->select('MA.status AS seenstatus, U.UserName AS username')
                                ->join('user AS U','MA.user_id = U.UserId')
                                ->where('MA.message_id',$message_id)
                                ->get('tbl_message_assigned AS MA')
                                ->result();
            return $result;
        }

}
