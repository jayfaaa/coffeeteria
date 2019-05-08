<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';


$route['(:any)'] = "home/$1";

$route['users']['post'] = "register_user";
$route['admin']['post'] = "add_blog";

$route['report']['post'] = "home/add_report";

$route['blogs/(:num)/year']['get'] = "home/getBlogYear/$1";

$route['blogs/(:num)']['get'] = "home/edit_blog/$1";
$route['blogs/(:num)/dp']['get'] = "home/deleteBlog/$1";
$route['blogs/(:num)']['post'] = "home/edit_save/$1";

$route['blogs/(:num)/comments']['get'] = "home/viewBlog/$1";
$route['blogs/(:num)/comments']['post'] = "home/add_comment/$1";
$route['blogs/(:num)/dc/(:num)']['get'] = "home/deleteComment/$1/$2";




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
