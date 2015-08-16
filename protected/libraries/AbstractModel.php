<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 03.08.15
 * Time: 15:33
 */

abstract class AbstractModel
{
    protected static $table;
    protected $values = [];

    //------------------------------------------------------------------------------------------------------------------
    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function __get($key)
    {
        return $this->values[$key];
    }

    //------------------------------------------------------------------------------------------------------------------
    public function findAll()
    {
        $sql = 'SELECT * FROM '. static::$table;
        $db = new Database();
        var_dump($db->query($sql)); die;
        return $db->query($sql);
    }

    //------------------------------------------------------------------------------------------------------------------
    public function findByID($id)
    {
        $sql = 'SELECT * FROM '. static::$table .' WHERE id=:id';
        $db = new Database();
        $result = $db->query($sql, [':id' => $id]);
        if (!empty($result)) $result = $result[0];
        return $result;
    }

    //------------------------------------------------------------------------------------------------------------------
    public function insert()
    {
        $fields = array_keys($this->values);
        $values   = [];

        foreach ($fields as $field) {
            $values[':'. $field] = $this->values[$field];
        }

        $sql = 'INSERT INTO '. static::$table;
        $sql.= ' ('. implode(', ', $fields) .')';
        $sql.= ' VALUES';
        $sql.= ' ('. implode(', ', array_keys($values)) .')';

        $db = new Database();
        return $db->query($sql, $values);
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