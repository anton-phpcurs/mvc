<?php

/**
 * Created by PhpStorm.
 * User: Anton Abrosimov
 * Date: 02.08.2015
 * Time: 14:13
 *
 * info {user/info/id}( madelUser [avatar, ferstName, lastName, phone] + modelLots[colLots] + modelComments[listComment])
 * mylots {user/mylots/pageid + [/find_session]} ( madelUser [avatar, ferstName, lastName, phone] + modelLots[listLots])
 * mybids {user/mybids/pageid + [/find_session]} ( madelUser [avatar, ferstName, lastName, phone] + modelBids[listBids])
 * settings {user/settings} (madelUser [avatar, ferstName, lastName, phone])
 * _save {user/save + post}
 * _mylotsearch {user/mylotssearch + post}
 * _mybidsearch {user/mybidssearch + post}
 * _mylotdelete {user/mylotdelete/id}
 *
 */

class Controller_User
extends Controller
{
/*
    public function execute ()
    {
        // не нужен
    }
*/
    public function actionInfo ()
    {
        if (count ($this -> valueURL) > 0) {
            Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из modelUsers, modelLots, modelBids по ID:' . $this->valueURL[0]);
            Log::sendToScreen(__FILE__, __LINE__, 'View -> render');
        } else {
            $this -> linkError();
        }
    }

    public function actionMyLots ()
    {
        $page   = (count ($this -> valueURL) > 0) ? $this -> valueURL[0] : 1;
//Log::sendToScreen(__FILE__, __LINE__, 'Сделать выборку согласно $_SESSION["search"] данные в БД');

        if (isset($_SESSION['search'])) {
//Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из modelUsers (session_user_id), modelLots на страницу №:'. $page .' согласно поиску: '. $_SESSION['search']);
        } else {
//Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из modelUsers (session_user_id) и ВСЕ данные modelLots на страницу №:'. $page);
        }
//Log::sendToScreen(__FILE__, __LINE__, 'View -> render');
        $view = new View();
        $view -> setTemplate ('mylots');
        $view -> render ();
    }


    public function actionMyBids ()
    {
        $page   = (count ($this -> valueURL) > 0) ? $this -> valueURL[0] : 1;
//Log::sendToScreen(__FILE__, __LINE__, 'Сделать выборку согласно $_SESSION["search"] данные в БД');

        if (isset($_SESSION['search'])) {
//Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из modelUsers (session_user_id), modelLots на страницу №:'. $page .' согласно поиску: '. $_SESSION['search']);
        } else {
//Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из modelUsers (session_user_id) и ВСЕ данные modelLots на страницу №:'. $page);
        }
//Log::sendToScreen(__FILE__, __LINE__, 'View -> render');

        $view = new View();
        $view -> setTemplate ('mybids');
        $view -> render ();
    }

    public function actionSettings ()
    {
//Log::sendToScreen(__FILE__, __LINE__, 'Получить настройки из modelUsers (session_user_id)');
//Log::sendToScreen(__FILE__, __LINE__, 'View -> render');
        $view = new View();
        $view -> setTemplate ('settings');
        $view -> render ();
    }


    public function actionSave ()
    {
        Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из POST');
        Log::sendToScreen(__FILE__, __LINE__, 'Cохранить данные в БД');
        Log::sendToScreen(__FILE__, __LINE__, 'Редирект user/settings');
    }

    public function actionMyLotSearch ()
    {
        Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из POST');
        Log::sendToScreen(__FILE__, __LINE__, 'Сохранить в $_SESSION["search"] занчение');
        Log::sendToScreen(__FILE__, __LINE__, 'Сделать выборку согласно $_SESSION["search"] данные в БД');
        Log::sendToScreen(__FILE__, __LINE__, 'Редирект user/mylots');
    }

    public function actionMyBidSearch ()
    {
        Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из POST');
        Log::sendToScreen(__FILE__, __LINE__, 'Сохранить в $_SESSION["search"] занчение');
        Log::sendToScreen(__FILE__, __LINE__, 'Сделать выборку согласно $_SESSION["search"] данные в БД');
        Log::sendToScreen(__FILE__, __LINE__, 'Редирект user/mybids/1');
    }

    public function actionMyLotDelete ()
    {
        if (count ($this -> valueURL) > 0) {
            Log::sendToScreen(__FILE__, __LINE__, 'Получить данные из POST');
            Log::sendToScreen(__FILE__, __LINE__, 'Удалить лот №'. $this -> valueURL[0]);
        }
        Log::sendToScreen(__FILE__, __LINE__, 'Редирект user/mylots');
    }
}