<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_404
extends Controller
{
    //------------------------------------------------------------------------------------------------------------------
    public function action ()
    {
        $view = new View();
        $view -> setTemplate ('404');
        $view -> render ();
    }
}