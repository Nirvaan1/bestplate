<?php

class DishController
{
    public function showAllAction()
    {
        $title = 'recette';
        $modelPagination = new PaginationModel();
        $modelDish = new DishModel();
        $allDishesByPage = $modelPagination->dishPagination();
        $allDishes = $modelDish->findAll();
        $allDishesNumber = count($allDishes);
        $totalPage = ceil($allDishesNumber/12);

        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $allDishesNumber) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }

        return [
            "template" =>
                [
                    "folder" => "dish",
                    "file" => "showall",
                ],
            "allDishesByPage"   => $allDishesByPage,
            "totalPage"         => $totalPage,
            "pageCourant"       => $pageCourant,
            "title"             => $title,

            "neededScripts"=>
                [
                    "ajaxRemove.js",
                ],
        ];
    }

    public function showoneAction()
    {
        if (isset($_GET["id"]) && ctype_digit($_GET["id"]) && !$_POST) {
            $title = 'recette';
            $modelDish      = new DishModel();
            $modelState     = new StateModel();
            $modelStep      = new StepsModel();
            $modelQuantity  = new QuantityModel();
            $modelComment   = new CommentModel();

            $dish = $modelDish->findOne($_GET["id"]);
            $numberRecipes = $modelDish->findRecipeByUser($dish['userId']);
            $state = $modelState->findStateByDish($_GET["id"]);
            $step = $modelStep->findStepByDish($_GET["id"]);
            $quantity = $modelQuantity->findQuantityByDish($_GET["id"]);


            $modelPagination = new PaginationModel();
            $allCommentByPage = $modelPagination->commentPaginationForDish($_GET["id"]);
            $allComments = $modelComment->findCommentByDish($_GET["id"]);
            $allCommentsNumber = count($allComments);
            $totalPage = ceil($allCommentsNumber/2);

            if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $allCommentsNumber) {
                $_GET['page'] = intval($_GET['page']);
                $pageCourant = $_GET['page'];
            }else{
                $pageCourant = 1;
            }

            return [
                "template" =>
                    [
                        "folder" => "dish",
                        "file" => "showone",
                    ],
                "dish"              => $dish,
                "state"             => $state,
                "step"              => $step,
                "quantity"          => $quantity,
                "title"             => $title,
                "allCommentByPage" => $allCommentByPage,
                "totalPage"        => $totalPage,
                "pageCourant"      => $pageCourant,
                "numberRecipes"      => $numberRecipes,
                "neededScripts"=>
                    [
                        "star.js",
                    ],

            ];


        }
        if ($_POST){
            $modelComment   = new CommentModel();
            $error = false;
            if (!isset($_POST["name"])  || strlen(trim($_POST["name"])) < 2)
            {
                $error = true ;
                FlashBag::getInstance()->addMessage("Veuillez entrer un PSEUDO de plus de 2 caractères");
            }
            if (!isset($_POST["description"]) || strlen(trim($_POST["description"])) < 2)
            {
                $error = true ;
                FlashBag::getInstance()->addMessage("Veuillez entrer un CONTENU de plus de 2 caractères");
            }
            if (!isset($_POST["note"]) || !ctype_digit($_POST["note"]) || $_POST["note"] == 0)
            {
                $error = true ;
                FlashBag::getInstance()->addMessage("Veuillez référencer une NOTE");
            }
            if ($error)
            {
                return [
                    "redirect"=>
                        [
                            "routeName" => "resto_dish_showone",
                            "args" =>
                                [
                                    "id" => $_GET["id"],
                                ]
                        ]
                ];
            }else{
                $description = trim($_POST["description"]);
                $dishId = $_POST["dishId"];
                $name = trim($_POST["name"]);
                $note = ($_POST["note"]);

                $modelComment->createCommentForDish($description, $dishId, $name, $note);
                FlashBag::getInstance()->addMessage("Votre commentaire a bien été enregistrer ".$name." il est en cour de traitement...");

                return [
                    "redirect"=>
                        [
                            "routeName" => "resto_dish_showone",
                            "args" =>
                                [
                                    "id" => $dishId,
                                ]
                        ]
                ];
            }
        }
    }

    public function searchAction()
    {
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
            ];
        }else{
            return ["redirect" => "resto_home_main"];
        }


    }

    public function createAction()
    {
        if (!UserSession::getInstance()->isAuthenticated())
        {
            return ["redirect" => "resto_home_main"];
        }

        if (!$_POST) {
            return [
                "template" =>
                    [
                        "folder" => "dish",
                        "file" => "create",
                    ],
            ];

        }

        $error = false;

        if (!isset($_POST["title"])  || strlen(trim($_POST["title"])) < 2)
        {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un TITRE de plus de 2 caractères ");
        }
        if (!isset($_POST["description"]) || strlen(trim($_POST["description"])) < 100)
        {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer une DESCRIPTION de plus de 99 caractères");
        }
        if (!isset($_POST["price"]) || !filter_var($_POST["price"], FILTER_VALIDATE_FLOAT))
        {
             $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un PRIX au bon format(remplacer la virgule par un point)");
        }
        if (!isset($_POST["category"]) || $_POST["category"] == "-1" )
        {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez sélectioner une CATEGORIE");
        }
        if ($error)
        {
            return["redirect"=>"resto_dish_create"];
        }
        else
        {

            $title = trim($_POST["title"]);
            $description = trim($_POST["description"]);
            $price = $_POST["price"];
            $category = $_POST["category"];

            $model = new DishModel();
            $id = $model->create($title, $description, $price, $category);

            $fileHelper= new FileHelper();

            if ($fileHelper->hasValidUploadedFile("image"))
            {
                $baseName = "dish_$id";
                $newName = $fileHelper->saveUploadFile("image",$baseName,"dish");
                $model->updateImage($id, $newName);
            }

            return ["redirect" => "resto_dish_showall"];
        }
    }


    public function updateAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }

        if (isset($_GET["id"]) && ctype_digit($_GET["id"]))
        {

            $model = new DishModel();
            $dish = $model->findOne($_GET["id"]);

            return [
                "template" =>
                    [
                        "folder" => "dish",
                        "file" => "update",
                    ],
                "dish" => $dish,
            ];

        }
        elseif($_POST)
        {
            $error = false;

            if (!isset($_POST["title"])  || strlen(trim($_POST["title"])) < 2)
            {
                $error = true ;
                FlashBag::getInstance()->addMessage("Veuillez entrer un TITRE de plus de 2 caractères");

            }
            if (!isset($_POST["description"]) || strlen(trim($_POST["description"])) < 100)
            {
                $error = true ;
                FlashBag::getInstance()->addMessage("Veuillez entrer une DESCRIPTION de plus de 99 caractères");
            }
            if (!isset($_POST["price"]) || !filter_var($_POST["price"], FILTER_VALIDATE_FLOAT))
            {
                $error = true ;
                FlashBag::getInstance()->addMessage("Veuillez entrer un PRIX au bon format(remplacer la virgule par un point)");
            }
            if (!isset($_POST["category"]) || $_POST["category"] == "-1" )
            {
                $error = true ;
                FlashBag::getInstance()->addMessage("Veuillez sélectiioner une CATEGORIE");
            }
            if (!isset($_POST["id"]) || !ctype_digit($_POST["id"]))
            {
                $error = true;
            }
            if ($error && isset($_POST["id"]))
            {
                return [
                    "redirect"=>
                        [
                            "routeName" => "resto_dish_update",
                            "args" =>
                                [
                                    "id" => $_POST["id"],
                                ]
                        ]
                ];
            }


            $title = trim($_POST["title"]);
            $description = trim($_POST["description"]);
            $price = $_POST["price"];
            $category = $_POST["category"];
            $id = $_POST["id"];

            $model = new DishModel();
            $dish = $model->findOne($id);
            $model->update($title, $description, $price, $category, $id);
            $fileHelper = new FileHelper();

            if(isset($_POST["sup"]) || $fileHelper->hasValidUploadedFile("image") )
            {
                if($dish["image"])
                {
                    $fileHelper->removeImage($dish['image'], "dish");
                    if(! $fileHelper->hasValidUploadedFile("image") )
                    {
                        $model->updateImage($id, "") ;
                    }
                }
            }


            if ($fileHelper->hasValidUploadedFile("image"))
            {
                $baseName = "dish_$id";
                $newName = $fileHelper->saveUploadFile("image",$baseName,"dish");
                $model->updateImage($id, $newName);
            }


            FlashBag::getInstance()->addMessage("plat $title est bien mis à jour");
            return ["redirect" => "resto_dish_showall"];


        }
        else
        {
            return ["redirect"=> "resto_dish_showall"];
        }
    }

    public function deleteAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }

        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {
            $model = new DishModel();
            $model->delete($_GET["id"]);

            return ["jsonResponse" => true,];

        }

    }




}