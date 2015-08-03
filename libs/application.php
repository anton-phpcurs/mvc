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
    //private $actionName;
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

        if (class_exists ($controllerName)) {
            $controller = new $controllerName;
            $controller -> setValue ($this -> value);
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
        $this -> value = $arg;
    }
}