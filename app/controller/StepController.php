<?php


class StepController
{
    public function showAllAction()
    {
        $model = new DishModel();
        $allDishes = $model->findAll();

        return [
            "template" =>
                [
                    "folder" => "dish",
                    "file" => "showall",
                ],
            "allDishes" => $allDishes,

            "neededScripts" =>
                [
                    "ajaxRemove.js",
                ],
        ];

    }


    public function showoneAction()
    {
        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {
            $model = new DishModel();
            $dish = $model->findOne($_GET["id"]);

            if (!$dish) {
                return ["redirect" => "resto_dish_showall"];
            }

            return [
                "template" =>
                    [
                        "folder" => "dish",
                        "file" => "showone",
                    ],
                "dish" => $dish,
            ];


        } else {
            return ["redirect" => "resto_dish_showall"];
        }
    }


    public function createAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        if (!$_POST) {
            return [
                "template" =>
                    [
                        "folder" => "admin",
                        "file" => "dishedit",
                    ],
            ];

        }

        if (isset($_POST['formStep'])){
            $error = false;
            if (!isset($_POST["num"]) || !ctype_digit($_POST["num"])) {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez entrer un Nombre");
            }
            if (!isset($_POST["description"]) || strlen(trim($_POST["description"])) < 10) {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez entrer une DESCRIPTION de plus de 15 caractères");
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
                    "admin" => $admin,
                ];
            } else {
                $num = $_POST["num"];
                $description = trim($_POST["description"]);
                $dishId = $_POST["dishId"];

                $model = new StepsModel();
                $model->create($dishId, $num, $description);

                return [
                    "redirect" =>
                        [
                            "routeName" => "resto_dish_update",
                            "args" =>
                                [
                                    "id" => $_POST["dishId"],
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
            $model = new StepsModel();
            $model->delete($_GET["id"]);

            return ["jsonResponse" => true,];

        }

    }




}