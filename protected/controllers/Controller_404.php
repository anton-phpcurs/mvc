<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 23:42
 */

class Controller_404
    extends AbstractController
{
    //------------------------------------------------------------------------------------------------------------------
    public function action()
    {
        $view = new View();
        $view->addBuffer('page', 'layout-main.html');
        $view->addBuffer('content', 'block-404.html');
        $view->renderBuffer();
    }
}