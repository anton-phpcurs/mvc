<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_Main
    extends AbstractController
{
    //------------------------------------------------------------------------------------------------------------------
    public function action()
    {
        $users = new Model_User();
        $users->findByID('1');

        $view = new View();
        $view->addBuffer('page', 'layout-main.html');
        $view->addBuffer('content', 'block-main.html');
        $view->renderBuffer();
    }
}