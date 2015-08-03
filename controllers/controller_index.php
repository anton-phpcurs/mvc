<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_Index
    extends Controller
{
    public function execute ()
    {
        $view = new View();
        $view -> setTemplate ('index');
        $view -> render ();
    }
}