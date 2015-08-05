<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 04.08.15
 * Time: 12:00
 */

class Model_Main
extends Model
{
    //------------------------------------------------------------------------------------------------------------------
    public function __construct ()
    {
        $this -> connect();
    }

    //------------------------------------------------------------------------------------------------------------------
    public function getIndex ()
    {
        $model = new Model ();
        $model -> connect();

        $query = 'SELECT l.`created`,l.id,l.title,l.description,c.name,u.first_name,u.last_name,u.email,u.phone
                FROM lot l
                JOIN category c
                ON l.category_id=c.id
                JOIN `user` u
                ON u.id=l.user_id
                WHERE is_active=1
                ORDER BY l.`created` DESC
                LIMIT 6';

        $result['lastGoods'] =  $model ->select ($query);
        return $result;
    }
}