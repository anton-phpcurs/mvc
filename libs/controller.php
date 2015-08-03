<?php

/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 14:02
 */
abstract class Controller
{
    protected $action;
    protected $value;

    public function setAction ($action)
    {
        Log::sendToScreen(__FILE__,__FILE__,'Добавлено действие: '. $action, false);
        $this -> action = $action;
    }

    public function setValue ($value)
    {
        Log::sendToScreen(__FILE__,__FILE__,'Добавлено значение: '. $value, false);
        $this -> value = $value;
    }

    abstract protected function execute ();
}