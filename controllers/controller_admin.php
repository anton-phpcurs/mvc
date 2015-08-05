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
        $view -> setTemplate ('auth');
        $view -> render ();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionBanList ()
    {
        $view = new View();
        $view -> setTemplate ('banlist');
        $view -> render ();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionConfig ()
    {
        $view = new View();
        $view -> setTemplate ('config');
        $view -> render ();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionLots ()
    {
        $view = new View();
        $view -> setTemplate ('lots');
        $view -> render ();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionMail ()
    {
        $view = new View();
        $view -> setTemplate ('mail');
        $view -> render ();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function actionUser ()
    {
        $view = new View();
        $view -> setTemplate ('user');
        $view -> render ();
    }
}