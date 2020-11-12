<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MAgent extends MY_Model{

        /**
	 * Constructor
	 *
	 * Calls the initialize() function
	 */
        function __construct()
        {
                parent::__construct();                
        }

        // ------------------------------------------------------------------------

        /**
         * Add
         *
         * Add a new contact record in database
         *
         * @access  public
         * @return  void
         */
        function add()
        {
                $data   = array(
                            'code'         => $this->input->post('code'),
                            'title'        => $this->input->post('title'),
                            'address'      => $this->input->post('address'),
                            'phone'        => $this->input->post('phone'),
                            'fax'          => $this->input->post('fax'),
                            'mobile'       => $this->input->post('mobile'),
                            'email'        => $this->input->post('email'),
                            'designation'  => $this->input->post('designation'),
                            'contact_person'  => $this->input->post('contact_person'),
                            'contact_phone'=> $this->input->post('contact_phone'),
                            'remarks'      => $this->input->post('remarks'),
                            'status'       => $this->input->post('status')
                );
                return parent::insert($data);
        }

        // ------------------------------------------------------------------------
        
        /**
         * Update Record(s)
         *
         * @param integer   $id    Primary Key
         * @param array     $data  Array of data to be updated
         * @return boolean
         */
        function update($id, $data)
        {
                return parent::update($id, $data);
        }        

}
// END Model Class

/* End of file Model.php */
/* Location: ./system/libraries/Model.php */