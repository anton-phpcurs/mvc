<?php

/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 14:13
 *
 * �������� ��� ��������� 'User':
 * - ��������
 * - ������������� (���������)
 * - �������
 * - ��������
 * - ���������
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
        Log::sendToScreen(__FILE__,__FILE__,'�������� ������������ '. $this -> value, false);
    }

    public function actionSave ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'�������� ������ ������������', false);
    }
    public function actionDelete ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'������ ������������', false);
    }

    public function actionOn ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'�������� ������������', false);
    }

    public function actionOff ()
    {
        Log::sendToScreen(__FILE__,__FILE__,'������� ������������', false);
    }
}