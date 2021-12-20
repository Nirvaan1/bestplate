<?php


class QuantityController
{
    public function createAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;

        if(isset($_POST["formQte"])) {
            $error = false;

            if (!isset($_POST["ingredient"]) || $_POST["ingredient"] == "-1") {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez sélectioner un INGREDIENT");
            }
            if (!isset($_POST["qte"]) || !filter_var($_POST["qte"], FILTER_VALIDATE_FLOAT)) {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez entrer un NOMBRE en guise de quantitée");
            }
            if ($error) {
                return [
                    "redirect" =>
                        [
                            "routeName" => "resto_dish_update",
                            "args" =>
                                [
                                    "id" => $_POST["dishId"],
                                ]
                        ],
                ];
            } else {
                $ingredient = ($_POST["ingredient"]);
                $qte = trim($_POST["qte"]);
                $dishId = $_POST["dishId"];

                $model = new QuantityModel();
                $model->create($dishId, $qte, $ingredient);


                FlashBag::getInstance()->addMessage("Ingredient ajouté au Plat");
                return [
                    "redirect" =>
                        [
                            "routeName" => "resto_dish_update",
                            "args" =>
                                [
                                    "id" => $dishId,
                                ]
                        ],
                    "admin" => $admin,

                ];
            }
        }

    }



    public function deleteAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }

        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {
            $model = new QuantityModel();
            $model->delete($_GET["id"]);

            return ["jsonResponse" => true,];

        }

    }

}