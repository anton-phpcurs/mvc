<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_Admin
extends Controller
{
    //------------------------------------------------------------------------------------------------------------------
    public function actionAuth ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('admin', $valuesMain);
        $view -> addBuffers('auth');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionBanList ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('admin', $valuesMain);
        $view -> addBuffers('banlist');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionConfig ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('admin', $valuesMain);
        $view -> addBuffers('config');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionLots ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('admin', $valuesMain);
        $view -> addBuffers('lots');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionMail ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('admin', $valuesMain);
        $view -> addBuffers('mail');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionUser ()
    {
        $model = new Model_Lot();
        $query = 'SELECT * FROM category';
        $valuesMain['catList'] =  $model ->select ($query);

        $view = new View();
        $view -> addBufferMain('admin', $valuesMain);
        $view -> addBuffers('user');
        $view -> renderBuffer();
    }
}