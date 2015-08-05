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
    //------------------------------------------------------------------------------------------------------------------
    public function action ()
    {
        $model = new Model_Index();
        $result = $model -> getIndex();

        //Генерить меню полностью в переменную и передавать во вью
        // Генерить полностью товары в переменную и передавать во вью

        $view = new View();
        $view -> setTemplate ('index');
        $view -> setValue ($result);
        $view -> render ();
    }
}