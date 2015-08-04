<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_Lots
    extends Controller
{
    public function actionCreate ()
    {
        $view = new View();
        $view -> setTemplate ('create');
        $view -> render ();
    }

    public function actionAll ()
    {
        $page = 1;
        if (!empty($this -> valueURL)) {
            $page = ($this -> valueURL[0] < 1) ? 1 : $this -> valueURL[0];
        }

        $model = new Model_Lot();
        $result = $model -> getAllOnPage ($page);

        if (!$result) Application::redirect_in('/lot');

        $view = new View();
        $view -> setTemplate ('search');
        $view -> setValue ($result);
        $view -> render ();
    }

    public function actionInfo ()
    {
        if (empty($this -> valueURL)) Application::redirect_in('/404');
        $id = $this -> valueURL[0];

        $model = new Model_Lot();
        $result = $model -> getInfo ($id);

        if (empty ($result['description'])) Application::redirect_in('/lots/notfound');

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

    public function actionCategory ()
    {
        $view = new View();
        $view -> setTemplate ('search');
        $view -> render ();
    }
}