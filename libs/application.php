<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 01.08.2015
 * Time: 23:11
 */

/**
 * Возможные варианты url
 * USER
 * url/user/add         Добавление юзера + POST-данные из формы
 * url/user/edit/id     Показать страницу редактирования данных пользователя №id
 * url/user/save        Сохранение POST-данные из формы
 * url/user/delete/id   Удалить пользователя №id (подтверждение паролем пользователя или администатора)
 * url/user/on/id       Разбанить пользователя №id (подтверждение паролем администатора)
 * url/user/off/id      Забанить пользователя №id (подтверждение паролем администатора)
 * url/user/lots/id     Показать страницу всех лотов пользователя №id
 * url/user/bods/id     Показать страницу всех ставок пользователя №id
 *
 * LOT
 * url/lot/add          Добавление лота + POST-данные из формы
 * url/lot/save         Сохранение POST-данные из формы
 * url/lot/delete/id    Удалить лота №id (проверка авторизации)
 *
 * PAGE
 * url/page/index       Показать главную страницу
 * url/page/contactus   Показать страницу контактов
 * url/page/signin      Показать страницу регистрации/
 * url/page/404         Ничего не показать
 *
 * To-Do: дописать остальные
 */

class Application
{
    private $controllerName;
    private $actionName;
    private $value;

    /**
     * Инициализация приложения
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
     * Запуск приложения
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
     * Переадрисация
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
     * Проверка аргумента
     * @param $array
     * @param string $value
     * @return mixed|string
     */
    private function getArgument (&$array, $value = ''){
        $argument = array_shift ($array);
        return preg_match ('/^[a-zA-Z0-9_]+$/', $argument) ? $argument : $value;
    }
}