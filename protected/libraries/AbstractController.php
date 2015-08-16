<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.08.2015
 * Time: 18:38
 */
abstract class AbstractController
{
    protected $valueURL;
    protected $valuePOST;

    //------------------------------------------------------------------------------------------------------------------
    public function setValueFromURL($value)
    {
        $this->valueURL = $value;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function setValueFromPOST($value)
    {
        $this->valuePOST = $value;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function execute()
    {
        $actionName = array_shift ($this -> valueURL);
        if (preg_match ('/^[a-zA-Z0-9_]*$/', $actionName)) {$actionName = '';}
        $actionName = 'action'. ucfirst($actionName);

        if (method_exists(get_class($this), $actionName)) {
            $this->$actionName();
        } else {
            Application::redirectIn('/404');
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    abstract protected function action();
}