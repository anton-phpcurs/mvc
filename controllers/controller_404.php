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
        $model = new Model_Category ();
        $valuesMain['catList'] = $model -> getCategoryAll();

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('404');
        $view -> renderBuffer();
    }
}