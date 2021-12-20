<?php

class AdminIngredientController
{
    public function listAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        $modelPagination = new PaginationModel();
        $modelIngredient = new IngredientModel();
        $allIngredientsByPage = $modelPagination->ingredientPagination();
        $allIngredients = $modelIngredient->findAll();
        $allIngredientsNumber = count($allIngredients);
        $totalPage = ceil($allIngredientsNumber/12);

        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $allIngredientsNumber) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }

        return [
            "template" =>
                [
                    "folder" => "admin",
                    "file" => "ingredientlist",
                ],
            "allIngredientsByPage"      => $allIngredientsByPage,
            "totalPage"                 => $totalPage,
            "pageCourant"               => $pageCourant,
            "admin"                     => $admin,

            "neededScripts"=>
                [
                    "ajaxRemove.js",
                ],
        ];

    }


    public function searchAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        if (isset($_GET['q']) AND !empty($_GET['q']) AND $_GET['q'] !== " ")
        {
            $q = htmlspecialchars($_GET['q']);
            $q = trim($q);
            $model = new DishModel();
            $resultSearch = $model->searchDish($q);
            return [
                "template" =>
                    [
                        "folder" => "dish",
                        "file" => "search",
                    ],
                "resultSearch"   => $resultSearch,
                'search' => $q,
                "admin" => $admin,
            ];
        }else{
            return ["redirect" => "resto_home_main"];
        }


    }

    public function createAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        $modelIngredient = new IngredientModel();
        $ingredients = $modelIngredient->findAll();

        if (!$_POST) {
            return [
                "template" =>
                    [
                        "folder" => "admin",
                        "file" => "ingredientadd",
                    ],
                "admin" => $admin,
                "ingredients" => $ingredients,
            ];

        }
        $error = false;
        if (!isset($_POST["name"])  || strlen(trim($_POST["name"])) < 2) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un NOM de plus de 2 caractères ");
        }
        if (!isset($_POST["unit"])) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer une UNIT");
        }
        if (!isset($_POST["img"]) || stristr($_POST["img"],"https://assets.afcdn.com/recipe/") == FALSE) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un LIENS D'IMAGE provenant du site 'https://www.marmiton.org/recettes/index/ingredient'");
        }
        if ($error)
        {
            return["redirect"=>"resto_ingredient_create"];
        }
        else
        {
            $name    = trim($_POST["name"]);
            $unit    = trim($_POST["unit"]);
            $img     = $_POST["img"];

            $model = new IngredientModel();
            $model->create($name, $unit, $img);

            FlashBag::getInstance()->addMessage("L'Ingredient '$name' est ajouté");
            return ["redirect" => "resto_ingredient_list"];
        }
    }

    public function deleteAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }

        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {
            $model = new IngredientModel();
            $model->delete($_GET["id"]);
            return ["jsonResponse" => true,];
        }

    }




}