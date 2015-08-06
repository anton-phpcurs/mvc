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
        $view = new View();
        $view -> addBufferMain('admin');
        $view -> addBuffers('auth');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionBanList ()
    {
        $view = new View();
        $view -> addBufferMain('admin');
        $view -> addBuffers('banlist');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionConfig ()
    {
        $view = new View();
        $view -> addBufferMain('admin');
        $view -> addBuffers('config');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionLots ()
    {
        $view = new View();
        $view -> addBufferMain('admin');
        $view -> addBuffers('lots');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionMail ()
    {
        $view = new View();
        $view -> addBufferMain('admin');
        $view -> addBuffers('mail');
        $view -> renderBuffer();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionUser ()
    {
        $view = new View();
        $view -> addBufferMain('admin');
        $view -> addBuffers('user');
        $view -> renderBuffer();
    }
}