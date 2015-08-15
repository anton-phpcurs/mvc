<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 03.08.15
 * Time: 15:33
 */

class View
{
    private $values = [];
    private $buffers = [];

    //------------------------------------------------------------------------------------------------------------------
    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function addBuffer($name, $template)
    {
        $this->buffers[$name] = $template;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function renderBuffer ()
    {
        $page = '';

        extract($this->values);
        $buffers = array_reverse($this->buffers);

        foreach ($buffers as $key => $value) {
            ob_start();
            include_once __DIR__ .'/../views/'. $buffers[$key];
            $$key = ob_get_clean();
        }
        echo $page;
    }
}