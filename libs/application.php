<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 01.08.2015
 * Time: 23:11
 */

class Application
{
    private $controllerName;
    private $valueURL;
    private $valuePOST;

    public function __construct ()
    {
        session_start();

        if (Config::DEBUG) {
            ini_set('display_errors', 1);
            ini_set('error_reporting', E_ALL);
        }
    }

    public function run ()
    {
        $this -> parsRequest();
        $controllerName = 'Controller_'. ucfirst ($this -> controllerName);

        if (class_exists ($controllerName)) {
            $controller = new $controllerName;
            $controller -> setValueFromURL ($this -> valueURL);
            $controller -> setValueFromPOST ($this -> valuePOST);
            $controller -> execute ();
        } else {
            header('Location: '. Config::ROOT_URL .'/404');
            die();
        }
    }

    private function parsRequest ()
    {
        $url = trim ($_SERVER ['REQUEST_URI'], '/');
        $arg = explode ('/', $url);

        for ($i = 0; $i < Config::URL_ARG_OFFSET; $i++) {
            array_shift ($arg);
        }

        if($arg[0] === '') {$arg[0] = 'index';}

        for ($i = 0; $i < count ($arg); $i++) {
            if (!preg_match ('/^[a-zA-Z0-9_]+$/', $arg[$i])) {
                Log::sendToScreen(__FILE__, __LINE__, 'Анализ запроса: '. $arg[$i], true);
                $arg[0] = '404';
                breack;
            }
        }

        $this -> controllerName = array_shift ($arg);
        $this -> valueURL = $arg;
        $this -> valuePOST = $_POST;
    }
}