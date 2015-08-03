<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 01.08.2015
 * Time: 21:07
 */

$application = new Application ();
$application -> run ();

/**
 * Автозагрузка класса
 * @param $className
 */
function __autoload ($className) {
    $folders = array ('libs', 'controllers', 'models', 'views');

    foreach ($folders as $folder) {
        $path = sprintf('%s/%s/%s.php', __DIR__, $folder, $className);
        if (file_exists($path)) {
            require_once ($path);
            return;
        }
    }
}