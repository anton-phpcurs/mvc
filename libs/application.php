<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 01.08.2015
 * Time: 23:11
 */

/**
 * ��������� �������� url
 * USER
 * url/user/add         ���������� ����� + POST-������ �� �����
 * url/user/edit/id     �������� �������� �������������� ������ ������������ �id
 * url/user/save        ���������� POST-������ �� �����
 * url/user/delete/id   ������� ������������ �id (������������� ������� ������������ ��� �������������)
 * url/user/on/id       ��������� ������������ �id (������������� ������� �������������)
 * url/user/off/id      �������� ������������ �id (������������� ������� �������������)
 * url/user/lots/id     �������� �������� ���� ����� ������������ �id
 * url/user/bods/id     �������� �������� ���� ������ ������������ �id
 *
 * LOT
 * url/lot/add          ���������� ���� + POST-������ �� �����
 * url/lot/save         ���������� POST-������ �� �����
 * url/lot/delete/id    ������� ���� �id (�������� �����������)
 *
 * PAGE
 * url/page/index       �������� ������� ��������
 * url/page/contactus   �������� �������� ���������
 * url/page/signin      �������� �������� �����������/
 * url/page/404         ������ �� ��������
 *
 * To-Do: �������� ���������
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

        for ($i = 0; $i < count ($arg); $i++) {
            if (!preg_match ('/^[a-zA-Z0-9_]+$/', $arg [$i])) {
                $arg[0] = '404';
            }
        }

        $this -> controllerName = array_shift ($arg);
        $this -> valueURL = $arg;
        $this -> valuePOST = $_POST;
    }
}