<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_ContactUs
extends Controller
{
    //------------------------------------------------------------------------------------------------------------------
    public function action ()
    {
        $view = new View();
        $view -> setTemplate ('contactus');
        $view -> render ();
    }
}