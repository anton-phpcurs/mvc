<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_Main
extends Controller
{
    //------------------------------------------------------------------------------------------------------------------
    public function action ()
    {
        $model = new Model_Category ();
        $valuesMain['catList'] = $model -> getCategoryAll();

        $model = new Model_Main();
        $values =  $model -> getIndex();

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('index', $values);
        $view -> renderBuffer();
    }
}