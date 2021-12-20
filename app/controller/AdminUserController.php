<?php

class AdminUserController
{
    public function listAction()
    {
        if (!UserSession::getInstance()->isAuthenticated())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        $model = new UserModel();
        $allUsers = $model->findAll();
        return [
            "template" =>
                [
                    "folder" => "admin",
                    "file" => "userlist" ,
                ],
            "admin" => $admin,
            "allUsers" => $allUsers,

        ];
    }
}