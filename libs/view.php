<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 03.08.15
 * Time: 15:33
 */

class View
{
    private $template;
    private $value;

    public function setTemplate ($value)
    {
        $this -> template = $value;
    }

    public function setValue ($value)
    {
        $this -> value = $value;
    }

    public function render ()
    {
        // TEMPLATE HACK
        ob_start();
        $folders = array ('page', 'goods', 'user', 'admin');
        $layout ='';

        if (count ($this -> value) > 0) extract ($this -> value);
        $url = Config::ROOT_URL;

        foreach ($folders as $folder) {
            $path = sprintf('%s/../view/%s/%s.phtml', __DIR__, $folder, $this -> template);

            if (file_exists($path)) {
                if (($folder == 'page') || ($folder == 'goods') || ($folder == 'user')) {$layout = 'layout.phtml';}
                if ($folder == 'admin') {$layout = 'admin.phtml';}
                include_once ($path);
            }
        }

        $content = ob_get_clean();

        ob_start();
        include (__DIR__ .'/../view/layout/'. $layout);
        echo ob_get_clean();
    }

}