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
    //------------------------------------------------------------------------------------------------------------------
    public function action ()
    {
        $page = 1;
        if (!empty($this -> valueURL)) {
            $page = ($this -> valueURL[0] < 1) ? 1 : $this -> valueURL[0];
        }

        $model = new Model_Lot();

        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $values =  $model -> getAllOnPage ($page);
        //if (!$values) Application::redirect_in('/lots');

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('search', $values);
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionInfo ()
    {
        if (empty($this -> valueURL)) Application::redirect_in('/404');
        $id = $this -> valueURL[0];

        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $values = $model -> getInfo ($id);

        if (empty ($values['description'])) Application::redirect_in('/lots/notfound');

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('description', $values);
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionCreate ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('create');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionNotFound ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('notfound');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionSearch ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('search');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionCategory ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('search');
        $view -> renderBuffer();
    }
}