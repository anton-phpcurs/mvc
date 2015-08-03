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
  /*  public function execute ()
    {
        $action = $this->action;
        if (method_exists (get_class($this), $action)) { $this->$action ();}
    }
*/
    public function actionAdd ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'Добавлен пользователь ', false);
    }

    public function actionSave ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'Изменены данные пользователя', false);
    }
    public function actionDelete ()
    {
        if (count ($this -> value) > 0) {
            Log::sendToScreen(__FILE__,__FILE__,'Удален пользователь #'. $this -> value[0], false);
        } else {
            Log::sendToScreen(__FILE__,__FILE__,'Нет значения ', false);
        }
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