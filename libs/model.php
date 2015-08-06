<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 03.08.15
 * Time: 15:33
 */

class Model
{
    private $pdo;

    //------------------------------------------------------------------------------------------------------------------
    public function __construct ()
    {
        $db_cfg  = Config::DB_DRIVER .':host='. Config::DB_HOSTNAME .';dbname='. Config::DB_BASENAME;

        try {
            $this -> pdo = new PDO($db_cfg, Config::DB_USERNAME, Config::DB_PASSWORD);
        } catch (PDOException $e) {
            Log::sendToScreen(__FILE__, __LINE__, 'Connection. ' . $e->getMessage(), true);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    public function select ($sql) {
        $result = [];

        try {
            $rows = $this -> pdo-> query ($sql);
        } catch (PDOException $e) {
            Log::sendToScreen(__FILE__, __LINE__, 'Query '.$sql .'<br>'. $e->getMessage(), true);
        }

        foreach ($rows as $row) {
            $result[] = $row;
        }
        return $result;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function selectOne ($sql) {
        $result = $this -> select($sql);

        if (!empty ($result)) {
            return $result[0];
        } else {
            return $result;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    public function insert ($sql)
    {
        try {
            $this -> pdo-> query ($sql);
        } catch (PDOException $e) {
            Log::sendToScreen(__FILE__, __LINE__, 'Query '.$sql .'<br>'. $e->getMessage(), true);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    public function update ($sql)
    {
        try {
            $this -> pdo-> query ($sql);
        } catch (PDOException $e) {
            Log::sendToScreen(__FILE__, __LINE__, 'Query '.$sql .'<br>'. $e->getMessage(), true);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    public function delete ($sql)
    {
        try {
            $this -> pdo-> query ($sql);
        } catch (PDOException $e) {
            Log::sendToScreen(__FILE__, __LINE__, 'Query '.$sql .'<br>'. $e->getMessage(), true);
        }
    }
}