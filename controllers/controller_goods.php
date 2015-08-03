<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_Goods
    extends Controller
{
    public function actionCreate ()
    {
        $view = new View();
        $view -> setTemplate ('create');
        $view -> render ();
    }

    public function actionDescription ()
    {
        $view = new View();
        $view -> setTemplate ('description');
        $view -> render ();
    }

    public function actionNotFound ()
    {
        $view = new View();
        $view -> setTemplate ('notfound');
        $view -> render ();
    }

    public function actionSearch ()
    {
        $view = new View();
        $view -> setTemplate ('search');
        $view -> render ();
    }
}