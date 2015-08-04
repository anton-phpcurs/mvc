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

    public function getInfo ($id)
    {
        $model = new Model ();
        $model -> connect();

        $query = 'SELECT l.id,l.title,l.start_price,l.description,l.category_id,c.name,u.id user_id,u.first_name,u.last_name
                FROM lot l
                JOIN category c
                ON l.category_id=c.id
                JOIN `user` u
                ON u.id=l.user_id
                WHERE l.id=' . $id;

        $result['description'] =  $model ->selectOne ($query);
        if (empty ($result['description'])) {return $result;}

        $query = 'SELECT id, front_img FROM lot WHERE category_id=' . $result['description']['category_id'] . ' AND id NOT IN (' . $id . ') LIMIT 5';
        $result['similar'] = $model->select($query);
        return $result;
    }

    //-------------------------------------------------------------------------------------------------------------------
    public function getAll ($page)
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
                LIMIT 6 OFFSET '. ($page - 1) * 6;

        $result['search'] =  $model -> select ($query);

        return $result;
    }
}