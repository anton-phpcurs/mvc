<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_404
    extends Controller
{
    public function execute ()
    {
        //Log::sendToScreen(__FILE__, __LINE__, 'PAGE 404', false);

        $view = new View();
        $view -> setValue(array('path_style' => '/public/style/'));
        $view -> setTemplate ('layout/layout.phtml');
        $view -> render ();
    }
}