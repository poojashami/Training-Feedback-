<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'FeedbackV2';
$route['feedbackv2'] = 'FeedbackV2';
$route['feedbackv2/(:any)'] = 'FeedbackV2/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
