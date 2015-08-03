<?php

/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 14:02
 */

class Controller
{
    protected $valueURL;
    protected $valuePOST;

    public function setValueFromURL ($value)
    {
        $this -> valueURL = $value;
    }

    public function setValueFromPOST ($value)
    {
        $this -> valuePOST = $value;
    }

    public function execute ()
    {
        $action = 'action'. array_shift ($this -> valueURL);
        if (method_exists (get_class($this), $action)) {
            $this->$action ();
        } else {
            Application::redirect(Config::ROOT_URL .'/404');
        }
    }
}