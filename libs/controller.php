<?php

/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 14:02
 */
abstract class Controller
{
    protected $value;

    public function setValue ($value)
    {
        $this -> value = $value;
    }

    public function execute ()
    {
        $action = 'action'. array_shift ($this -> value);
        if (method_exists (get_class($this), $action)) {
            $this->$action ();
        } else {
            header('Location: '. Config::ROOT_URL .'/404');
            die();
        }
    }
}