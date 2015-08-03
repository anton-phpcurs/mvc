<?php

/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 14:13
 */

class Controller_User
extends Controller
{
/*
    public function execute ()
    {
        // не нужен
    }
*/
    public function actionAdd ()
    {
        Log::sendToScreen(__FILE__,__LINE__,'�������� ������������ ', false);
    }

    public function actionSave ()
    {
        Log::sendToScreen(__FILE__,__LINE__,'�������� ������ ������������', false);
    }
    public function actionDelete ()
    {
        if (count ($this -> valueURL) > 0) {
            Log::sendToScreen(__FILE__,__LINE__,'Удалить пользователля #'. $this -> valueURL[0], false);
        } else {
            Log::sendToScreen(__FILE__,__LINE__,'Нет значения', false);
        }
        var_dump($this -> valuePOST);
    }

    public function actionOn ()
    {
        Log::sendToScreen(__FILE__,__LINE__,'�������� ������������', false);
    }

    public function actionOff ()
    {
        Log::sendToScreen(__FILE__,__LINE__,'������� ������������', false);
    }
}