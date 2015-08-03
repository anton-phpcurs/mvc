<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 03.08.15
 * Time: 15:33
 */

class View
{
    private $template;
    private $value;

    public function setTemplate ($value)
    {
        $this -> template = $value;
    }

    public function setValue ($value)
    {
        $this -> value = $value;
    }

    public function render ()
    {
        //Log::sendToScreen(__FILE__, __LINE__, 'Путь '. __DIR__ .'/../view/'. $this -> template , false);
        //if (file_exists (__DIR__ .'/../view/'. $this -> template)) {Log::sendToScreen(__FILE__, __LINE__, 'Найден' , false);}

        $path_prefix = '/public';
        $content = 'TEST';
        //Log::sendToScreen(__FILE__, __LINE__, 'Path_style '. Config::ROOT_URL .'/public/css' , false);

        ob_start();
        include __DIR__ .'/../view/'. $this -> template;

        echo ob_get_clean();
    }

}