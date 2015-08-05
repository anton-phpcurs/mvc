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
        $model = new Model ();
        $model -> connect();

        $query = 'SELECT * FROM category';
        $values['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('layout', $values);
        $view -> addBuffers('404');
        $view -> renderBuffer();
    }
}