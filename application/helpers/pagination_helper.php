<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');
/*****
  * The Pagination helper cuts out some of the bumf of normal pagination
  * @author		Philip Sturgeon
  * @email		email@philsturgeon.co.uk
  * @filename	pagination_helper.php
  * @title		Pagination Helper
  * @version	1.0
  *****/

// ------------------------------------------------------------------------

/**
 * Create Pagination
 *
 * Create Pagination Links
 *
 * 
 * @access      public
 * @param       string $uri
 * @param       number $total_rows
 * @param       number $limit
 * @param       number $uri_segment
 * @return      string
 */
if ( ! function_exists('create_pagination'))
{
        
        function create_pagination($uri, $total_rows, $limit = 4, $uri_segment = 3)
        {
                $ci =& get_instance();
                $ci->load->library('pagination');

                $current_page = $ci->uri->segment($uri_segment, 0);

                //echo $current_page; exit;

                // Initialize pagination

                //  Old way: doesn't work without mod_rewrite
                // $config['base_url'] = base_url().$uri.'/';
                // New way:
                $config['base_url'] = site_url() . $uri . '/';

                $config['total_rows'] = $total_rows; // count all records
                //$config['per_page'] = $limit === NULL ? $ci->settings->item('records_per_page') : $limit;
                $config['per_page'] = $limit;
                $config['uri_segment'] = $uri_segment;
                $config['page_query_string'] = FALSE;

                $config['num_links'] = 4;

                $config['full_tag_open'] = '<div id="pagination">';
                $config['full_tag_close'] = '</div>';

                $config['first_link'] = '&laquo; First';
                //$config['first_tag_open'] = '<span class="page">';
                //$config['first_tag_close'] = '</span>';

                $config['prev_link'] = '&laquo; Previous';
                //$config['prev_tag_open'] = '<span class="page">';
                //$config['prev_tag_close'] = '</span>';

                $config['cur_tag_open'] = '<span class="page active">';
                $config['cur_tag_close'] = '</span>';

                //$config['num_tag_open'] = '<span class="page">';
                //$config['num_tag_close'] = '</span>';

                $config['next_link'] = 'Next &raquo;';
                //$config['next_tag_open'] = '<span class="page">';
                //$config['next_tag_close'] = '</span>';

                $config['last_link'] = 'Last &raquo;';
                //$config['last_tag_open'] = '<span class="page">';
                //$config['last_tag_close'] = '</span>';

                $ci->pagination->initialize($config); // initialize pagination

                return array(
                        'current_page'          => $current_page,
                        'per_page' 		=> $config['per_page'],
                        'limit'			=> array($config['per_page'], $current_page),
                        'links' 		=> $ci->pagination->create_links()
                );
        }
}

// ------------------------------------------------------------------------


/**
 * Create Pagination Backend
 *
 * Create Pagination Links for backend specific to template layout
 * as follows:
 *
 * <div class="pagination">
 *          <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
 *          <a href="#" class="number" title="1">1</a>
 *          <a href="#" class="number" title="2">2</a>
 *          <a href="#" class="number current" title="3">3</a>
 *          <a href="#" class="number" title="4">4</a>
 *          <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
 * </div>
 * 
 *
 * @access      public
 * @param       string $uri
 * @param       number $total_rows
 * @param       number $limit
 * @param       number $uri_segment
 * @return      string
 */
if ( ! function_exists('create_pagination_backend'))
{
        function create_pagination_backend($uri, $total_rows, $limit = 4, $uri_segment = 4)
        { 
                $ci =& get_instance();
                $ci->load->library('pagination');

                $current_page = $ci->uri->segment($uri_segment, 0);

                //echo $current_page; exit;

                // Initialize pagination

                //  Old way: doesn't work without mod_rewrite
                // $config['base_url'] = base_url().$uri.'/';
                // New way:
                $config['base_url'] = site_url() . $uri . '/';

                $config['total_rows'] = $total_rows; // count all records
                //$config['per_page'] = $limit === NULL ? $ci->settings->item('records_per_page') : $limit;
                $config['per_page'] = $limit;
                $config['uri_segment'] = $uri_segment;
                $config['page_query_string'] = FALSE;

                $config['num_links'] = 4;

                $config['full_tag_open'] = '<div id="pagination">';
                $config['full_tag_close'] = '</div>';

                $config['first_link'] = '&laquo; First';
                //$config['first_tag_open'] = '<span class="page">';
                //$config['first_tag_close'] = '</span>';

                $config['prev_link'] = '&laquo; Previous';
                //$config['prev_tag_open'] = '<span class="page">';
                //$config['prev_tag_close'] = '</span>';

                $config['cur_tag_open'] = '<span class="page active">';
                $config['cur_tag_close'] = '</span>';

                //$config['num_tag_open'] = '<span class="page">';
                //$config['num_tag_close'] = '</span>';

                $config['next_link'] = 'Next &raquo;';
                //$config['next_tag_open'] = '<span class="page">';
                //$config['next_tag_close'] = '</span>';

                $config['last_link'] = 'Last &raquo;';
                //$config['last_tag_open'] = '<span class="page">';
                //$config['last_tag_close'] = '</span>';

                $ci->pagination->initialize($config); // initialize pagination

                return array(
                        'current_page'          => $current_page,
                        'per_page' 		=> $config['per_page'],
                        'limit'			=> array($config['per_page'], $current_page),
                        'links' 		=> $ci->pagination->create_links()
                );
        }
        
}

?>
