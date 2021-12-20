<?php

class UserController
{

    public function createAction()
    {
        if (!$_POST) {
            return [
            "template" =>
                    [
                        "folder" => "user",
                        "file"   => "create"
                    ],
                ];
        }
        else {
                $error = false;

                if(!isset($_POST["forname"]) || strlen(trim($_POST["forname"])) < 1) {
                    $error = true;
                    FlashBag::getInstance()->addMessage("Veuillez remplir le champ NOM");
                }

                if(!isset($_POST["lastname"]) || strlen(trim($_POST["lastname"])) < 1) {
                    $error = true;
                    FlashBag::getInstance()->addMessage("Veuillez remplir le champ PRENOM");
                }

                if(!isset($_POST["email"]) || !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) || strlen(trim($_POST["email"])) < 5) {
                    $error = true;
                    FlashBag::getInstance()->addMessage("Veuillez entrez une adresse EMAIL valide");
                }

                if(!isset($_POST["password"]) || strlen($_POST["password"]) < 5 ) {
                    $error = true;
                    FlashBag::getInstance()->addMessage("Veuillez entrez un mot de passe d'au moins 8 charactères");
                }

                if(!isset($_POST["confirm-password"]) || !($_POST["password"] == $_POST["confirm-password"])) {
                    $error = true;
                    FlashBag::getInstance()->addMessage("Mot de passe non confirmé !");
                }

                if ($error)
                {
                    return ["redirect" => "resto_user_create"];
                }

                $model = new UserModel();

                $forname  = trim($_POST["forname"]);
                $lastname = trim($_POST["lastname"]);
                $email    = trim($_POST["email"]);

                $model->create($forname, $lastname, $email, $_POST["password"]);

                Flashbag::getInstance()->addMessage("Bienvenu $forname, votre compte a bien etait ajouter !");
                return ["redirect" => "resto_user_login"];
            }

    }

    public function loginAction()
    {
        if(!$_POST)
        {
             return [
            "template" =>
                    [
                        "folder" => "user",
                        "file"   => "login"
                    ],
                ];
        }
        else
        {
            if (!isset($_POST["email"]) || !isset($_POST["password"])) {
                FlashBag::getInstance()->addMessage("Email ou Mot de passe invalide");
                return array("redirect" => "resto_user_login");
            }

            $model = new UserModel();
            try {
                $user = $model->findEmailandCheckPassword($_POST["email"], $_POST["password"]);
            }
            catch (DomainException $e) {
                FlashBag::getInstance()->addMessage("Email ou Mot de passe incorrect");
                return ["redirect" => "resto_user_login"];
            }

            UserSession::getInstance()->create($user["id"], $user["forname"], $user["lastname"], $user["email"], $user["isAdmin"]);
            return ["redirect" => "resto_home_main"];
        }


    }

    public function logoutAction()
    {
        UserSession::getInstance()->kill();
        return ["redirect" => "resto_home_main"];
    }
}