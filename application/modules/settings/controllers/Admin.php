<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2009, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Settings Admin Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage          Libraries
 * @category            Libraries
 * @author		
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class Admin extends Admin_Controller {

        /**
         * Validation Rule
         *
         * @var     array
         * @access  public
         */
        private $_v_rules = array(
                // array(
                //         'field'   => 'offline',
                //         'label'   => 'Offline Status',
                //         'rules'   => 'trim|required|integer'
                // ),
                // array(
                //         'field'   => 'offline_message',
                //         'label'   => 'Offline Message',
                //         'rules'   => 'trim|htmlspecialchars|required|xss_clean'
                // ),
                // array(
                //         'field'   => 'site_name',
                //         'label'   => 'Site Name',
                //         'rules'   => 'trim|htmlspecialchars|required|max_length[100]|xss_clean'
                // ),
                array(
                        'field'   => 'admin_email',
                        'label'   => 'Administrator Email',
                        'rules'   => 'trim|valid_email|required'
                ),  
                array(
                        'field'   => 'fire_insurance',
                        'label'   => 'Fire Insurance Email',
                        'rules'   => 'trim|valid_email|xss_clean'
                ), 
                array(
                        'field'   => 'motor_insurance',
                        'label'   => 'Motor Insurance Email',
                        'rules'   => 'trim|valid_email|xss_clean'
                ), 
                array(
                        'field'   => 'aviation_insurance',
                        'label'   => 'Aviation Insurance Email',
                        'rules'   => 'trim|valid_email|xss_clean'
                ), 
                array(
                        'field'   => 'marine_insurance',
                        'label'   => 'Marine Insurance Email',
                        'rules'   => 'trim|valid_email|xss_clean'
                ), 
                array(
                        'field'   => 'engineering_insurance',
                        'label'   => 'Engineering Insurance Email',
                        'rules'   => 'trim|valid_email|xss_clean'
                ), 
                array(
                        'field'   => 'medical_insurance',
                        'label'   => 'Medical Aid Insurance Email',
                        'rules'   => 'trim|valid_email|xss_clean'
                ), 
                array(
                        'field'   => 'miscellaneous_insurance',
                        'label'   => 'MIscellaneous Insurance Email',
                        'rules'   => 'trim|valid_email|xss_clean'
                ), 
                array(
                        'field'   => 'traveling_insurance',
                        'label'   => '>Traveling Medical Insurance Email',
                        'rules'   => 'trim|valid_email|xss_clean'
                ), 
                // array(
                //         'field'   => 'professional_insurance',
                //         'label'   => '>Professional Indemnity Insurance Email',
                //         'rules'   => 'trim|xss_clean'
                // ),                 
                // array(
                //         'field'   => 'email_from_text',
                //         'label'   => 'Email From Text',
                //         'rules'   => 'trim|htmlspecialchars|required|max_length[50]|xss_clean'
                // ),
                // array(
                //         'field'   => 'address',
                //         'label'   => 'Office Address',
                //         'rules'   => 'trim|htmlspecialchars|required|max_length[100]|xss_clean'
                // ),
                // array(
                //         'field'   => 'page_limit',
                //         'label'   => 'Page Limit',
                //         'rules'   => 'trim|required|integer'
                // ),
                // array(
                //         'field'   => 'meta_description',
                //         'label'   => 'Meta Description',
                //         'rules'   => 'trim|htmlspecialchars|required|xss_clean'
                // ),
                // array(
                //         'field'   => 'meta_keywords',
                //         'label'   => 'Meta Keywords',
                //         'rules'   => 'trim|htmlspecialchars|required|xss_clean'
                // ),
                // array(
                //         'field'   => 'meta_tags',
                //         'label'   => 'Meta Tags',
                //         'rules'   => 'trim|htmlspecialchars|required|xss_clean'
                // ),
                // array(
                //         'field'   => 'google_analytics_script',
                //         'label'   => 'Google Analytics Script',
                //         'rules'   => 'trim'
                // )
        );
        // ---------------------------------------------------------------------


        /**
         * Setting ID
         *
         * We store site general setting information on a single row
         *
         * @var     array
         * @access  public
         */
        private $_settings_pk = 1;
        // ---------------------------------------------------------------------


        /**
	 * Constructor
	 *
	 * Calls the initialize() function
	 */
	function __construct()
	{
		parent::__construct();
                parent::index();

                $this->load->model('MSettings');
	}
        // ---------------------------------------------------------------------


        /**
         * Default Method
         *
         * Controller default method
         *
         * @param   integer     page number
         * @access  public
         * @return  void
         */
	function index(  )
	{ 
            //echo "<pre>"; print_r($_POST); exit;
                if( $this->input->post('process') == 'true' )
                {
                        /**
                         * Validation
                         */
                        $this->load->library('form_validation');
                        $this->form_validation->set_rules($this->_v_rules);


                        if ($this->form_validation->run() && $this->_settings_pk == intval($this->input->post('id')) )
                        {
                                $data   = array(

                                 'offline'                   => $this->input->post('offline'),
                                 'offline_message'           => $this->input->post('offline_message'),
                                 'site_name'                 => $this->input->post('site_name'),
                                 'admin_email'               => $this->input->post('admin_email'),
                                 'fire_insurance'               => $this->input->post('fire_insurance'),
                                 'motor_insurance'               => $this->input->post('motor_insurance'),
                                 'aviation_insurance'               => $this->input->post('aviation_insurance'),
                                 'marine_insurance'               => $this->input->post('marine_insurance'),
                                 'engineering_insurance'               => $this->input->post('engineering_insurance'),
                                 'medical_insurance'               => $this->input->post('medical_insurance'),
                                 'miscellaneous_insurance'               => $this->input->post('miscellaneous_insurance'),
                                 'traveling_insurance'               => $this->input->post('traveling_insurance'),
                                 'professional_insurance'               => $this->input->post('professional_insurance'),
                                 'email_from_text'           => $this->input->post('email_from_text'),
                                 'address'                   => $this->input->post('address'),
                                 'page_limit'                => intval($this->input->post('page_limit')),
                                 'meta_description'          => $this->input->post('meta_description'),
                                 'meta_keywords'             => $this->input->post('meta_keywords'),
                                 'meta_tags'                 => $this->input->post('meta_tags'),
                                 'google_analytics_script'   => $this->input->post('google_analytics_script')
                                            
                                );                                

                                if(  $this->MSettings->update($this->_settings_pk, $data ) )
                                {
										update_dop_user_log('has updated Settings.');
                                        $this->session->set_flashdata('_flash_msg', array(
                                                '_css_cls'  => 'success',
                                                '_message'  => 'Successfully updated'
                                        ));
                                }
                                else
                                {
                                        $this->session->set_flashdata('_flash_msg', array(
                                                '_css_cls'  => 'error',
                                                '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                                        ));
                                }
                                redirect('admin/settings');
                                exit();
                        }
                        else
                        {
                                $this->session->set_flashdata('_flash_msg', array(
                                        '_css_cls' => 'error',
                                        '_message' => 'Validation Failed!'
                                ));
                        }
                }

                // write content on template
                $data = array ( 'settings' => $this->MSettings->get($this->_settings_pk) );
                $this->template->write_view('content', 'admin/settings', $data, TRUE);

                $this->template->render();
	}

        // ---------------------------------------------------------------------
        
        
        function duration()
        {
            if( $this->input->post('process') == 'true' )
            {
                if (intval($this->input->post('id')))
                {
                        $data   = array(
                                    'new_duration'              => $this->input->post('new_duration'),
                                    'pending_duration'          => $this->input->post('pending_duration'),
                                    'reminder_timebound'        => $this->input->post('reminder_timebound')
                        );                                

                        $this->db->where('id', '1');
                        $upd_data = $this->db->update('autoscalation', $data); 
                        
                        if(  $upd_data )
                        {
                                $this->session->set_flashdata('_flash_msg', array(
                                        '_css_cls'  => 'success',
                                        '_message'  => 'Successfully updated'
                                ));
                        }
                        else
                        {
                                $this->session->set_flashdata('_flash_msg', array(
                                        '_css_cls'  => 'error',
                                        '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                                ));
                        }
                        redirect('admin/settings/duration');
                        exit();
                }
                else
                {
                        $this->session->set_flashdata('_flash_msg', array(
                                '_css_cls' => 'error',
                                '_message' => 'Validation Failed!'
                        ));
                }
            }

            // write content on template
            $data = array(
                        'settings'      => $this->db->select('*')
                                                    ->where('id', '1')
                                                    ->get('autoscalation')->row(),
                        'breadcrumbs'   => 'Time Settings'
            );
            $this->template->write_view('content', 'admin/duration', $data, TRUE);

            $this->template->render();
        }
        // ---------------------------------------------------------------------
        
        
        function status_messages()
        {
            if ($this->input->post('process') == 'true')
            {
                $count = count($this->input->post('hid_status_id'));
                
                for($i = 0; $i<$count; $i++)
                {
                    $row_id = $this->input->post('hid_status_id')[$i];
                    $data   = array(
                                'message_en'    => $this->input->post('message_en')[$i],
                                'message_np'    => $this->input->post('message_np')[$i]
                    );                                
                    $this->db->where('status_id', $row_id);
                    $upd_data = $this->db->update('grievance_status_messages', $data); 
                }
                
                if( $upd_data )
                {
                        $this->session->set_flashdata('_flash_msg', array(
                                '_css_cls'  => 'success',
                                '_message'  => 'Successfully updated'
                        ));
                }
                else
                {
                        $this->session->set_flashdata('_flash_msg', array(
                                '_css_cls'  => 'error',
                                '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                        ));
                }
                redirect('admin/settings/status_messages');
                exit();
            }
            else
            {
                    $this->session->set_flashdata('_flash_msg', array(
                            '_css_cls' => 'error',
                            '_message' => 'Validation Failed!'
                    ));
            }

            // write content on template
            $data = array(
                        'status_messages'   => $this->db->select('*')
                                                        ->get('grievance_status_messages')->result()
            );
            $this->template->write_view('content', 'admin/status_messages', $data, TRUE);
            $this->template->render();
        }
        
}

/* End of file admin.php */
/* Location: ./app/modules/services/controllers/admin.php */