<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = 'pagenotfound';


/**
 | -------------------------------------------------------------------------
 | ADMIN ROUTING
 | -------------------------------------------------------------------------
 | format: admin/modules/controllernaem
 | actual: modules/admin/controllername
 | @global <type> $GLOBALS['route']
 | @name $route
 */
$route['admin/([a-zA-Z_-]+)/(.+)']            = '$1/admin/$2';
$route['admin/(login|logout)']			= 'admin/$1';
$route['admin/([a-zA-Z_-]+)']			= '$1/admin/index';

/**
 | -------------------------------------------------------------------------
 | FRONT END ROUTING
 | -------------------------------------------------------------------------
 | 
 | @global <type> $GLOBALS['route']
 | @name $route
 */
//$route['search_item/(:any)'] = "welcome/search_item/$1";
//$route['process_purchase'] = "welcome/process_purchase";
//$route['process_feedback'] = "welcome/process_feedback";
//$route['show_map'] = "welcome/show_map";
//$route['purchase'] = "welcome/purchase";
//$route['subscribe'] = "welcome/subscribe";

// $route['gallery'] = "gallery/index";
// $route['gallery/(:num)'] = "picture/details/$1";

$route['insertfeedback'] = "welcome/insertfeedback";
$route['contact'] = "welcome/feedback";
$route['citizen-charter'] = "welcome/citizenCharter";
$route['aboutus'] = "pages/GetDetails/introduction-to-rbcl";
$route['introduction-to-rbcl'] = "pages/GetDetails/introduction";
$route['companyprofile'] = "pages/GetDetails/profile";
$route['boardmembers'] = "staffs";
$route['members/details/(:any)'] = "staffs/staffdetails/$1";
$route['managementteam'] = "welcome/allstaffs";
// $route['messagefromceo'] = "pages/GetDetails/messagefromceo";


$route['messageFrom/(:any)'] = "welcome/getMessageFromCeoAndChairperson/$1";


$route['claim'] = "pages/GetDetails/claim";
$route['language'] = "welcome/ChangeLanguage";

$route['pages/(:any)']= 'pages/GetDetails/$1';
$route['pages/search']= 'pages/search';
$route['sitemap']= 'welcome/sitemap';
$route['branches']= 'welcome/branches';


$route['all-staffs'] = "welcome/getAllStaffList";  //calling the getAllStaffList function inside welcome controller to fetch all the staffs

//services
$route['services/(:any)'] = 'services/GetDetails/$1';

//weensure
$route['re-insure/(:any)'] = 'weensure/GetDetails/$1';

//weensure
$route['payments'] = 'payments/GetPaymentList';

// $route['payments/(:any)'] = 'payments/GetDetails/$1';

//news
$route['news/(:any)'] = 'news/GetDetails/$1';
$route['latest-notice'] = 'news/latestNews';
$route['latest-notice/(:any)'] = 'news/latestNewsDetails/$1';

//reports
$route['reports/(:any)'] = 'reports/GetDetails/$1';

//resources
$route['resources/(:any)']= 'resources/GetDetails/$1';

//tender
$route['tender/(:any)']= 'tender/GetDetails/$1';

//publication
$route['publication/(:any)']= 'publication/GetDetails/$1';

//$route['register'] = "welcome/register";
$route['members_login'] = "members/members_login";
$route['members_logout'] = "members/members_logout";
$route['events/([a-zA-Z_-]+)'] = "events/index/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */