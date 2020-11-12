<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    function __construct() {
        parent::__construct();
        parent::index();
        $this->load->model('Mmessageadmin');
        $this->url ='message';
        $this->table_name ='tbl_message';
        $this->pagelimit = 15;
        $this->load->helper('date');
    }

    function index() {
        $this->record('list');
    }

    function record($cipher='null', $id='null') {
        if( $this->input->post('process') == 'true' ) {
            if( $this->Mmessageadmin->save()) {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  =>
                    intval($this->Encryption->decode($cipher))?
                    'Successfully Updated.':'Successfully Added.'
                    ));
                update_dop_user_log('has added '.$this->table_name);
            }
            else {
                $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'error',
                    '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                    ));
            }
            intval($this->Encryption->decode($cipher))?redirect('admin/'.$this->url.'/record/list', 'refresh'):
            redirect('admin/'.$this->url.'/record/list', 'refresh');
        }
        if(isset($cipher) && is_numeric($this->Encryption->decode($cipher)) ) {
            if($this->session->userdata('user_type') != '1') { 
                redirect('admin/'.$this->url.'/record/list', 'refresh');
            }

            $id = $this->Encryption->decode($cipher);
            $list_all = $this->Mmessageadmin->pickRecord($cipher);
            $userlist = $this->Mmessageadmin->getUserList();
            $userchecked = $this->Mmessageadmin->getUserCheckedList($id);
            $date = date('Y-m-d');

            $data_content   =  array(
                'page_header'        => 'Add/Edit Message Details',
                'url'                => $this->url,
                'record'             => $list_all,
                'date'               => $date,
                'userlist'           => $userlist,
                'userchecked'        => $userchecked,
            );

            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
            $this->template->render();
        }

        elseif(isset($cipher) && $cipher=="list") {
            $offset = ($this->uri->segment(5) && intval($this->uri->segment(5)))?($this->uri->segment(5)):0;
            $result = $this->Mmessageadmin->getAdminInboxList($offset,$this->pagelimit);
            $total_rows = $this->Mmessageadmin->getTotalCountAdminInboxList();
            $base_url = base_url().'admin/'.$this->url.'/record/list/';
            $pagination = paginate($total_rows,$base_url,$this->pagelimit);
            $inboxcount = $this->Mmessageadmin->getInboxCount();
            $data = array (
               'list'                   => $result,
               'url'                    => $this->url,
               'page_header'            => 'Inbox Message',
               'offset'                 => $offset,
               'pages'                  => $pagination,
               'inboxcount'             => $inboxcount,
            );
            // p($data['list']);
            $this->template->write_view('content', 'admin/report', $data, TRUE);
            $this->template->render();
        }
         elseif(isset($cipher) && $cipher=="sent") {
            if($this->session->userdata('user_type') != '1') { 
                redirect('admin/'.$this->url.'/record/list', 'refresh');
            }
            $offset = ($this->uri->segment(5) && intval($this->uri->segment(5)))?($this->uri->segment(5)):0;
            $result = $this->Mmessageadmin->getAdminSendList($offset,$this->pagelimit);
            $total_rows = $this->Mmessageadmin->getTotalCountAdminSendList();
            $base_url = base_url().'admin/'.$this->url.'/record/list/';
            $pagination = paginate($total_rows,$base_url,$this->pagelimit);
            $inboxcount = $this->Mmessageadmin->getInboxCount();
            $data = array (
               'list'                   => $result,
               'url'                    => $this->url,
               'page_header'            => 'Sent Message',
               'offset'                 => $offset,
               'pages'                  => $pagination,
               'inboxcount'             => $inboxcount,
            );
            // pe($data);
            $this->template->write_view('content', 'admin/sendreport', $data, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="create") {
            if($this->session->userdata('user_type') != '1') { 
                redirect('admin/'.$this->url.'/record/list', 'refresh');
            }
        	$date = date("Y-m-d h:i:s");
            $userlist = $this->Mmessageadmin->getUserList();
            $data_content =array (
                'page_header'        => 'Compose New Message',
                'url'                => $this->url,
                'date'               => $date,
                'userlist'           => $userlist,
            );

            $this->template->write_view('content', 'admin/edit', $data_content, TRUE);
            $this->template->render();
        }
        elseif(isset($cipher) && $cipher=="deactivate" && isset($id)) {
            if($this->session->userdata('user_type') != '1') { 
                redirect('admin/'.$this->url.'/record/list', 'refresh');
            }

            $id = $this->Encryption->decode($id);
            $this->deactivate($id);
            $this->session->set_flashdata('_flash_msg', array(
                    '_css_cls'  => 'success',
                    '_message'  => 'Record Deleted'
                    ));
            redirect('admin/'.$this->url.'/record/list', 'refresh');
        }
        else{
            redirect(base_url().'admin','refresh');
        }
    }

    function deactivate($id) {
        $data_content   =  array(
            'page_header'   => 'Delete Records',
            'record'        => $this->Mmessageadmin->deactivate($id)
        );
        return true;
    }

    function view($cipher){
        $id = $this->Encryption->decode($cipher);
        $record = $this->Mmessageadmin->getMessageDetail($id);
        $userid = $this->session->userdata('userid');
        $this->Mmessageadmin->updateViewedStatus($id,$userid);

        $userchecked = $this->Mmessageadmin->getUserCheckedListDetail($id);
        $inboxcount = $this->Mmessageadmin->getInboxCount();
        $viewlist = $this->Mmessageadmin->getMessageViewList($id);

        $data_content   =  array(
            'page_header'          => 'Read Message',
            'url'                  => $this->url,
            'record'               => $record,
            'inboxcount'           => $inboxcount,
            'viewlist'             => $viewlist,
        );
        $this->template->write_view('content', 'admin/view', $data_content, TRUE);
        $this->template->render();
    }
}
