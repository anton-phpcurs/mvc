<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 03.08.15
 * Time: 15:33
 */

class View
{
    private $bufferMain = [];
    private $buffers = [];

    private $template;
    private $value;

    //------------------------------------------------------------------------------------------------------------------
    public function setTemplate ($value)
    {
        $this -> template = $value;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function setValue ($value)
    {
        $this -> value = $value;
    }

    //------------------------------------------------------------------------------------------------------------------
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
                if (($folder == 'page') || ($folder == 'goods') || ($folder == 'user')) {
                    $layout = 'layout.phtml';

                    $model = new Model ();
                    $model -> connect();

                    $query = 'SELECT * FROM category';
                    $catList =  $model ->select ($query);

                }
                if ($folder == 'admin') {$layout = 'admin.phtml';}
                include_once ($path);
            }
        }
        $content = ob_get_clean();
        //var_dump($lastGoods); die;
        ob_start();
        include (__DIR__ .'/../view/layout/'. $layout);
        echo ob_get_clean();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function addBufferMain ($template, $values = [])
    {
        $this -> bufferMain['template'] = $template;
        $this -> bufferMain['values'] = $values;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function addBuffers ($template, $values = [])
    {
        $i = count ($this -> buffers);
        $this -> buffers[$i]['template'] = $template;
        $this -> buffers[$i]['values'] = $values;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function renderBuffer ()
    {
        $folders = array ('page', 'goods', 'user', 'admin'); //Config::$template_folders[]
        $url = Config::ROOT_URL;
        ob_start();

        for ($i = (count ($this -> buffers)- 1); $i >= 0; $i--) {
            $tamplate = $this -> buffers[$i]['template'];
            $values   = $this -> buffers[$i]['values'];
            $isFinded = false;

            foreach ($folders as $folder) {
                $path = sprintf('%s/../view/%s/%s.phtml', __DIR__, $folder, $tamplate);

                if (file_exists($path)) {
                    $isFinded = true;
                    break;
                }
            }
            if ($isFinded){
                if (count ($values) > 0) extract ($values);
                include_once ($path);
            } else {
                Log::sendToScreen(__FILE__, __LINE__, 'Template don`t founf.', true);
            }
        }

        $content = ob_get_clean();

        //var_dump($lastGoods); die;

        $tamplate = $this -> bufferMain['template'];
        $values   = $this -> bufferMain['values'];
        $pathLayout = sprintf('%s/../view/layout/%s.phtml', __DIR__, $tamplate);

        if (file_exists ($pathLayout)) {
            if (count ($values) > 0) extract ($values);
            include_once ($pathLayout);
        } else {
            Log::sendToScreen(__FILE__, __LINE__, 'Template don`t founf: '. $pathLayout, true);
        }
    }

}































