<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['default_controller'] = 'welcome';
$route['contact'] = 'view_controller/contact_fc';
$route['privacy-policy'] = 'view_controller/privacy_policy_fc';
$route['terms'] = 'view_controller/terms_fc';
$route['seo/sitemap\.xml'] = "seo/sitemap";
$route['site-map'] = 'meta_controller/site_map_fc';
$route['list-of-all-pincodes-of-india'] = 'view_controller/list_fc';

$route['sitemap-gen'] = 'sitemap/index';
$route['sitemap-gene'] = 'sitemap/general';
$route['sitemap-art'] = 'sitemap/articles';

$route['search-by-place'] = 'view_controller/search_by_place_fc';
$route['default_controller'] = 'view_controller/home_fc';


$route['(:num)'] = 'view_controller/search_pincode_fc'; 


$route['state_entered'] = 'view_controller/state_entered';
$route['(:any)'] = 'view_controller/state_in_url_fc'; 

$route['(:any)/district_entered'] = 'view_controller/district_entered';
$route['(:any)/(:any)'] = 'view_controller/district_in_url_fc';

$route['(:any)/(:any)/po_entered'] = 'view_controller/po_entered';
$route['(:any)/(:any)/(:any)'] = 'view_controller/po_in_url_fc';

$route['404_override'] = 'view_controller/search_by_place_fc';

$route['translate_uri_dashes'] = FALSE;
































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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

