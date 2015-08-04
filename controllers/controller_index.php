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
    public function actionIndex ()
    {
        $model = new Model ();
        $model -> connect();

        $query = 'SELECT * FROM category WHERE id = 9';
        $result =  $model ->select ($query);
//var_dump ($result);

        //Генерить меню полностью в переменную и передавать во вью
        // Генерить полностью товары в переменную и передавать во вью

        $view = new View();
        $view -> setTemplate ('index');
        //$view -> setValue (array);
        $view -> render ();
    }
}