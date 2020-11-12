<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
 * CodeIgniter Settings Model Class
 *
 * @package		CodeIgniter
 * @subpackage          Models
 * @category            Models
 * @author		Bishal Lepcha<lepchaboy47@gmail.com>
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class Msettings extends MY_Model{

        /**
	 * Constructor
	 *
	 * Calls the initialize() function
	 */
        function __construct()
        {
                //parent::Model();
                parent::__construct();
        }

        // ------------------------------------------------------------------------

        /**
         * Get List of records
         *
         * @param <type> $params
         * @return <type>
         */
        function get_list($params = array())
	{
		if(isset($params['order'])) $this->db->order_by($params['order']);

		// Limit the results based on 1 number or 2 (2nd is offset)
		if(isset($params['limit']) && is_int($params['limit'])) $this->db->limit($params['limit']);
		elseif(isset($params['limit']) && is_array($params['limit'])) $this->db->limit($params['limit'][0], $params['limit'][1]);

		return $this->db->get('services')->result();
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
        
        // ------------------------------------------------------------------------

        /**
         * Get Per Page Limit
         *
         * @param       void
         * @return      number
         */
        function get_page_limit()
        {
                return $this->db->select('page_limit')
                                ->where('id', 1)
                                ->get('settings')
                                ->field_data();

        }




        

}
// END Model Class

/* End of file Model.php */
/* Location: ./system/libraries/Model.php */