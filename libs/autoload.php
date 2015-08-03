<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 01.08.2015
 * Time: 21:29
 */

ECHO sprintf('<div style="background:#f90; margin: 5px 0">%s : %s >> %s</div>', __FILE__, __LINE__, 'Autoload Load');

$folders = array ('libs', 'controllers', 'models', 'views');

function __autoload ($className)
{
    global $folders;

    foreach ($folders as $folder) {
        $path = sprintf('%s/%s/%s.php', dirname (__DIR__), $folder, $className);
        if (file_exists($path)) {
            require_once ($path);
            return;
        }
    }

    if (!$exist) {die ('Site offline.');}
}