<?php

class AdminHomeController
{
    public function homeAction()
    {
        if (!UserSession::getInstance()->isAuthenticated())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        return [
            "template" =>
                [
                    "folder" => "admin",
                    "file" => "home" ,
                ],
            "admin" => $admin,

        ];
    }
}
