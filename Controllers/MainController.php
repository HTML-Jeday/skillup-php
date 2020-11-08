<?php

class MainController
{
    public function index()
    {
        $smarty = View::getInstance();

        $users = UserModel::all();
        $now = date("H:i:s", time());

        $smarty->assign('users', $users);
        $smarty->assign('time', $now);
        $smarty->display('index.tpl');
    }
}