<?php

/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 14:13
 *
 * Операции над сущностью 'User':
 * - Добавить
 * - Редактировать (Сохранить)
 * - Удалить
 * - Забанить
 * - Разбанить
 */

class Controller_User
extends Controller
{
    public function execute ()
    {
        $action = $this->action;
        if (method_exists (get_class($this), $action)) { $this->$action ();}
    }

    public function actionAdd ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'Добавлен пользователь '. $this -> value, false);
    }

    public function actionSave ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'Изменены данные пользователя', false);
    }
    public function actionDelete ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'Удален пользователь', false);
    }

    public function actionOn ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'Разбанен пользователь', false);
    }

    public function actionOff ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'Забанен пользователь', false);
    }
}