<?php
// autoload classes 
function autoloader($class)
{
    if (file_exists('app/model/' . $class . '.php')) {
        require_once 'app/model/' . $class . '.php';
    } else if (file_exists('app/controller/' . $class . '.php')) {
        require_once 'app/controller/' . $class . '.php';
    } else if (file_exists('app/view/modules/' . $class . '.php')) {
        require_once 'app/view/modules/' . $class . '.php';
    } else if (file_exists('./' . $class . '.php')) {
        require_once './' . $class . '.php';
    }
}

// register the autoloader
spl_autoload_register('autoloader');


$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

switch ($request_uri[0]) {
    case '/':
        require 'app/view/loginView.php';
        break;
    case '':
        require 'app/view/loginView.php';
        break;
    case '/uitvaartcentra':
        require 'app/view/uitvaartcentraView.php';
        break;
    case '/test':
        require 'app/view/test.php';
        break;
    default:
        require 'app/view/404.php';
        break;
}