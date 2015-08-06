<?php
/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 06.08.15
 * Time: 10:38
 */

class Model_Category
extends Model
{
    //------------------------------------------------------------------------------------------------------------------
    public function getCategoryAll ()
    {
        $model = new Model ();

        $query = 'SELECT * FROM category';
        $values =  $model ->select ($query);

        return $values;
    }
}