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
        $view->addBuffer('page', 'layout.html');
        $view->addBuffer('content', 'tpl-404.html');
        $view->renderBuffer();

       // Log::sendToScreen(__FILE__, __LINE__, '404');
        //$model = new Model_Category ();
        //$valuesMain['catList'] = $model -> getCategoryAll();

        //$view = new View();
        //$view -> addBufferMain('layout', $valuesMain);
        //$view -> addBuffers('404');
        //$view -> renderBuffer();
    }
}