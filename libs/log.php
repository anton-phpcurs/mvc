<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 8:17
 */

class Log
{
    const LFN_FORMAT  = '%s/log/%s.log';
    const MSG_FORMAT  = "[%s] %s [%s] >> %s\n";
    const MSG_OFFLINE = 'Site offline';

    const MSG_SCREEN  = '<div style="background: #fC7; margin: 10px 0; padding: 5px; border: 1px solid #d70; border-radius: 5px;">
                         <span style="font-weight: bold">%s [%s]: </span>%s</div>';
    /**
     * @param $file
     * @param $line
     * @param $message
     * @param bool|true $stop
     */
    public static function sendToFile ($file, $line, $message, $stop = true)
    {
        $fName = sprintf (self::LFN_FORMAT, dirname (__DIR__), date('Y-m-d'));
        $fHandle = @fopen ($fName, 'a') or die (self::MSG_OFFLINE.' (-fno).');

        $txt = sprintf (self::MSG_FORMAT, date('Y-m-d H:i:s'), $file, $line, $message);
        if (@fwrite ($fHandle, $txt) === false) die (self::MSG_OFFLINE. ' (-fnw).');
        fclose ($fHandle);

        if ($stop) die (self::MSG_OFFLINE. ' (-log).');
    }

    /**
     * @param $file
     * @param $line
     * @param $message
     * @param bool|true $stop
     */
    public static function sendToScreen ($file, $line, $message, $stop = true)
    {
        echo sprintf (self::MSG_SCREEN, $file, $line, $message);
        if ($stop) die;
    }
}