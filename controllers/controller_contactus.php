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
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('contactus');
        $view -> renderBuffer();
    }
}