<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'frontend/Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


################### FRONTEND #############################

// $route['home'] = 'frontend/Home';
$route['home'] = "frontend/Home";
$route['home/contacto'] = "frontend/Home/contacto";
$route['contacto/enviar'] = "frontend/Home/enviar";
$route['productos-escolar'] = 'frontend/Productos/escolar';
$route['productos-oficina'] = 'frontend/Productos/oficina';


################### BACKEND  Area #############################
$route[$this->config->item('path_backend') . '/inicio'] = "backend/Area/listar";
$route[$this->config->item('path_backend') . '/areas'] = "backend/Area/listar";
$route[$this->config->item('path_backend') . '/areas/(:num)'] = "backend/Area/listar/$1";
$route[$this->config->item('path_backend') . '/areas/buscar'] = "backend/Area/buscar";
$route[$this->config->item('path_backend') . '/areas/buscar/(:num)'] = "backend/Area/buscar/$1";
$route[$this->config->item('path_backend') . '/areas/send/(:num)'] = "backend/Area/send/$1";
$route[$this->config->item('path_backend') . '/areas/export'] = "backend/Area/export";
$route[$this->config->item('path_backend')] = "backend/inicio/index";


$route[$this->config->item('path_backend') . '/productos'] = "backend/Productos/listar";
$route[$this->config->item('path_backend') . '/productos/(:num)'] = "backend/Productos/listar/$1";
$route[$this->config->item('path_backend') . '/productos/buscar'] = "backend/Productos/buscar";
$route[$this->config->item('path_backend') . '/productos/buscar/(:num)'] = "backend/Productos/buscar/$1";
$route[$this->config->item('path_backend') . '/productos/eliminar/(:num)'] = "backend/Productos/eliminar/$1";
$route[$this->config->item('path_backend') . '/productos/send/(:num)'] = "backend/Productos/send/$1";
$route[$this->config->item('path_backend') . '/productos/export'] = "backend/Productos/export";


$route[$this->config->item('path_backend') . '/informes'] = "backend/Informe/listar";
$route[$this->config->item('path_backend') . '/informes/(:num)'] = "backend/Informe/listar/$1";
$route[$this->config->item('path_backend') . '/informes/buscar'] = "backend/Informe/buscar";
$route[$this->config->item('path_backend') . '/informes/buscar/(:num)'] = "backend/Informe/buscar/$1";
$route[$this->config->item('path_backend') . '/informes/eliminar/(:num)'] = "backend/Informe/eliminar/$1";
$route[$this->config->item('path_backend') . '/informes/send/(:num)'] = "backend/Informe/send/$1";
$route[$this->config->item('path_backend') . '/informes/export'] = "backend/Informe/export";




#login
$route[$this->config->item('path_backend') . '/login'] = "backend/inicio/login";
$route[$this->config->item('path_backend') . '/logout'] = "backend/inicio/logout";
