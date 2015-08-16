<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.08.2015
 * Time: 16:33
 */
class Application
{
    //------------------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        session_start();

        if (Config::DEBUG) {
            ini_set('display_errors', 1);
            ini_set('error_reporting', E_ALL);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    public function run()
    {
        $url  = $_SERVER['REQUEST_URI'];
        $args = explode('/', trim($url, '/'));

        $controllerName = array_shift($args);

        if ($controllerName == '') {
            $controllerName = 'Main';
        } elseif (!preg_match('/^[a-zA-Z0-9_]*$/', $controllerName)){
            $controllerName = '404';
        }

        $controllerName = 'Controller_'. ucfirst($controllerName);

        if (class_exists($controllerName)) {
            $controller = new $controllerName;
            $controller->setValueFromURL($args);
            $controller->setValueFromPOST($_POST);
            $controller->execute();
        } else {
            self::redirectIn('/404');
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    public static function redirectIn($location)
    {
        header('Location: '. Config::ROOT_URL . $location);
        die;
    }

    //------------------------------------------------------------------------------------------------------------------
    public static function redirectOut($location)
    {
        header('Location: '. $location);
        die;
    }
}