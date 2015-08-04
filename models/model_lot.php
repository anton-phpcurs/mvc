<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 04.08.15
 * Time: 12:00
 */

class Model_Lot
extends Model
{
    public function __construct ()
    {
        $this -> connect();
    }

    public function getDescription ($id)
    {
        $model = new Model ();
        $model -> connect();

        $query = 'SELECT l.id,l.title,l.start_price,l.description,c.name,u.id user_id,u.first_name,u.last_name
                FROM lot l
                JOIN category c
                ON l.category_id=c.id
                JOIN `user` u
                ON u.id=l.user_id
                WHERE l.id=' . $id;

        $result['description'] =  $model ->selectOne ($query);


        $query = 'SELECT id,front_img FROM lot
                  WHERE  id ='. $id .' LIMIT 5';
             //      WHERE category_id=' . $category . 'AND id NOT IN(' . $id . ') LIMIT 5';

        $result['similar'] =  $model ->select ($query);

        return $result;
    }
}