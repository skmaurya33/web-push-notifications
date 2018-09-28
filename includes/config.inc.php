<?php

//Defining constants
############################
## Develop BY:SURAJ KUMAR MAURYA
############################

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'web_push';
    $base_url = 'http://localhost/tutorials/web-push-notifications/';
    $base_path = 'D:\xampp\htdocs\tutorials\web-push-notifications/';
} else {
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'web_push';
    $base_url = 'http://localhost/tutorials/web-push-notifications/';
    $base_path = 'D:\xampp\htdocs\tutorials\web-push-notifications/';
}

define('DB_HOST', $db_host);
define('DB_USERNAME', $db_username);
define('DB_PASSWORD', $db_password);
define('DB_NAME', $db_name);
define('BASE_URL', $base_url);
define('BASE_PATH', $base_path);
define('GOOGLE_SERVER_KEY', 'AIzaSyD_0sl1uQPt2rOtnYM7H6Iurf1Sx9SRDzQ');

require_once "Database.php";
require_once "functions.php";
