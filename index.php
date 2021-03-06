<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 15.08.2015
 * Time: 16:05
 */

$application = new Application();
$application->run();

//----------------------------------------------------------------------------------------------------------------------
function __autoload($className) {
    $folders = array('libraries', 'controllers', 'models', 'views');
    var_dump($className);
    foreach ($folders as $folder) {
        $path = sprintf('%s/protected/%s/%s.php', __DIR__, $folder, $className);
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
}