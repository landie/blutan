<?php
session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', (dirname(__FILE__)));
define('APPLICATION_PATH', ROOT . DS . 'application' . DS);

require_once( ROOT . DS . 'system' . DS . 'core' . DS . 'bootstrap.php');

if (ENVIRONMENT == true) {
    switch(ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            die("ENVIRONMENT not set");
    }
}

$blutan = Blutan::instance();

$blutan->frontController();
?>
