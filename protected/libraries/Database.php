<?php

/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 16.08.2015
 * Time: 9:55
 */
class Database
{
    private $handleDB;

    //------------------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $dsn  = Config::DB_DRIVER .':host='. Config::DB_HOSTNAME .';dbname='. Config::DB_BASENAME;
        $this->handleDB = new PDO($dsn, Config::DB_USERNAME, Config::DB_PASSWORD);
    }

    //------------------------------------------------------------------------------------------------------------------
    public function query($sql, $params = [])
    {
        $statement = $this->handleDB->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}