<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 01.08.2015
 * Time: 23:50
 */

class Config
{
//    const URL_ARG_OFFSET = 1;
    const URL_ARG_OFFSET = 0;

//    const ROOT_URL      = 'http://test/mvc'; /* NIX */
    const ROOT_URL      = 'http://localhost';
    const ROOT_EMAIL    = 'admin@admin.ua';
    const DEFAULT_CONTROLLER = 'page';
    const DEFAULT_ACTION = 'main';

    const DB_HOST = 'localhost';
    const DB_NAME = 'bazar';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    // const DB_DRIVER   = 'mysqli';

    const TIMEZONE  = 'Europe/Kiev';
    const VERSION   = '0.0';
    const DEBUG     = true;
}