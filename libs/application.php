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
    private $actionName;
    private $value;

    /**
     * ������������� ����������
     */
    public function __construct ()
    {
        session_start();

        if (Config::DEBUG) {
            ini_set('display_errors', 1);
            ini_set('error_reporting', E_ALL);
        }
    }

    /**
     * ������ ����������
     */
    public function run ()
    {
        $this -> parsRequest();

        $controllerName = 'Controller_'. ucfirst ($this -> controllerName);
        $actionName = 'action'. ucfirst ($this -> actionName);
        Log::sendToScreen(__FILE__, __LINE__, $controllerName, false);

        if (class_exists ($controllerName)) {
        //if (method_exists ($controllerName, $actionName)) {
            $controller = new $controllerName;
            $controller -> setAction ($actionName);
            $controller -> setValue ($this -> value);
            $controller -> execute ();
        } else {

Log::sendToScreen(__FILE__, __LINE__, 'Redirect: '. Config::ROOT_URL . '/404', false);

            //$this -> redirect(Config::ROOT_URL . '/page/404');
        }
    }

    /**
     * �������������
     * @param $url
     */
    public function redirect($url)
    {
        header('Location: '. $url);
        die();
    }

    /**
     *
     */
    private function parsRequest ()
    {
        $url = trim ($_SERVER ['REQUEST_URI'], '/');
        $arg = explode ('/', $url);

        for ($i = 0; $i < Config::URL_ARG_OFFSET; $i++) {
            array_shift ($arg);
        }

        $this -> controllerName = $this -> getArgument ($arg, 'page');
        $this -> actionName = $this -> getArgument ($arg, 'index');
        $this -> value = $this -> getArgument ($arg);
    }

    /**
     * �������� ���������
     * @param $array
     * @param string $value
     * @return mixed|string
     */
    private function getArgument (&$array, $value = ''){
        $argument = array_shift ($array);
        return preg_match ('/^[a-zA-Z0-9_]+$/', $argument) ? $argument : $value;
    }
}