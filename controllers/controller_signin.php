<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_SignIn
    extends Controller
{
    public function execute ()
    {
        $view = new View();
        $view -> setTemplate ('signIn');
        $view -> render ();
    }
}