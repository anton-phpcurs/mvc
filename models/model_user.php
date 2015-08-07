<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 04.08.15
 * Time: 12:00
 */

class Model_User
extends Model
{
    //------------------------------------------------------------------------------------------------------------------
    public function getUserInfo ($id)
    {
        $model = new Model ();

        $query = 'SELECT * FROM user WHERE id='. $id;

        $result['user'] =  $model ->selectOne ($query);
        return $result;
    }
}