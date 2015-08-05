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
    public function connect ()
    {
        $db_cfg  = Config::DB_DRIVER .':';
        $db_cfg .= 'host='. Config::DB_HOST .';';
        $db_cfg .= 'dbname='. Config::DB_NAME;

        try {
            $this -> pdo = new PDO($db_cfg, Config::DB_USER, Config::DB_PASSWORD);
        } catch (PDOException $e) {
            Log::sendToScreen(__FILE__, __LINE__, 'Подключение не удалось: ' . $e->getMessage(), true);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    public function select ($sql) {
        $result = [];

        $rows = $this -> pdo-> query ($sql);
        foreach ($rows as $row) {
            $result[] = $row;
        }
        return $result;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function selectOne ($sql) {

        $result = $this -> select($sql);
        //var_dump($result[0]); die;
        if (!empty ($result)) {
            return $result[0];
        } else {
            return $result;
        }
    }
}