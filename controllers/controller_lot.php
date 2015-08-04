<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_Lot
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
        if (count ($this -> valueURL) == 0) Application::redirect('/404');
        $id = $this -> valueURL[0];

        $model = new Model_Lot();
        $result = $model -> getDescription ($id);

        if (!$result['description']) Application::redirect('/lot/notfound');

        $view = new View();
        $view -> setTemplate ('description');
        $view -> setValue ($result);
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