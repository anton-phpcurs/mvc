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
        $this ->actionPage();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionPage ()
    {
        $page = 1;
        if (!empty($this -> valueURL)) {
            $page = ($this -> valueURL[0] < 1) ? 1 : $this -> valueURL[0];
        }

        $model = new Model_Category ();
        $valuesMain['catList'] = $model -> getCategoryAll();

        $model = new Model_Lot();
        $values['products'] =  $model -> getAllOnPage ($page);
        $values['category'] = 'Общая';
        $values['pages'] = (int) ceil ($model -> getCountAll () / 6);
        $values['link'] = '/lots/page/';

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

        $model = new Model_Category ();
        $valuesMain['catList'] = $model -> getCategoryAll();

        $model = new Model_Lot();
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
        $model = new Model_Category ();
        $valuesMain['catList'] = $model -> getCategoryAll();

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('create');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionNotFound ()
    {
        $model = new Model_Category ();
        $valuesMain['catList'] = $model -> getCategoryAll();

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('notfound');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionSearch ()
    {
        $model = new Model_Category ();
        $valuesMain['catList'] = $model -> getCategoryAll();

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('search');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionCategory ()
    {
        if (empty($this -> valueURL)) {
            Application::redirect_in('/404');
        }

        $category= ($this -> valueURL[0] < 1) ? 1 : $this -> valueURL[0];
        $page = 1;

        if (count ($this -> valueURL) > 2) {
            if ($this -> valueURL[1] == 'page') {
                $page = ($this -> valueURL[2] < 1) ? 1 : $this -> valueURL[2];
            }
        }

        $model = new Model_Category ();
        $valuesMain['catList'] = $model -> getCategoryAll();

        $model = new Model_Lot();
        $values['products'] = $model -> getByCategoryID ($category, $page);
        $values['category'] = $valuesMain['catList'][$category-1]['name'];
        $values['pages'] = (int) ceil (count ($values['products']) / 6);
        $values['link'] = '/lots/category/'. $valuesMain['catList'][$category-1]['id'] .'/page/';

        $view = new View();
        $view -> addBufferMain('layout', $valuesMain);
        $view -> addBuffers('search', $values);
        $view -> renderBuffer();
    }
}