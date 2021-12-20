<?php

class AdminDishController
{
    public function listAction()
    {
        if (!UserSession::getInstance()->isAuthenticated())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        $modelPagination = new PaginationModel();
        $modelDish = new DishModel();
        $allDishesByPage = $modelPagination->dishPaginationAdmin(UserSession::getInstance()->getUserId());
        $allDishes = $modelDish->findDishByUser(UserSession::getInstance()->getUserId());
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
                    "folder" => "admin",
                    "file" => "dishlist",
                ],
            "allDishesByPage"   => $allDishesByPage,
            "totalPage"         => $totalPage,
            "pageCourant"       => $pageCourant,
            "admin"             => $admin,

            "neededScripts"=>
                [
                    "ajaxRemove.js",
                ],
        ];

    }


    public function showoneAction()
    {
        if (!UserSession::getInstance()->isAuthenticated())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {
            $title = 'recette';
            $modelDish = new DishModel();
            $modelState = new StateModel();
            $modelStep = new StepsModel();
            $modelQuantity = new QuantityModel();
            $dish = $modelDish->findOne($_GET["id"]);
            $state = $modelState->findStateByDish($_GET["id"]);
            $step = $modelStep->findStepByDish($_GET["id"]);
            $quantity = $modelQuantity->findQuantityByDish($_GET["id"]);

            if (!$dish) {
                return ["redirect" => "resto_dish_showall"];
            }

            return [
                "template" =>
                    [
                        "folder" => "dish",
                        "file" => "showone",
                    ],
                "dish"      => $dish,
                "state"     => $state,
                "step"      => $step,
                "quantity"  => $quantity,
                "title"     => $title,

            ];


        } else {
            return ["redirect" => "resto_dish_showall"];
        }
    }

    public function searchAction()
    {
        if (!UserSession::getInstance()->isAuthenticated())
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
        if (!UserSession::getInstance()->isAuthenticated())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;

        if (!$_POST) {
            $modelState = new StateModel();
            $modelType = new TypeModel();
            $states = $modelState->findAll();
            $type = $modelType->findAll();
            return [
                "template" =>
                    [
                        "folder" => "admin",
                        "file" => "dishadd",
                    ],
                "admin" => $admin,
                "states" => $states,
                "type" => $type,
            ];

        }

        $error = false;
        if (!isset($_POST["name"])  || strlen(trim($_POST["name"])) < 2) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un Nom de plus de 2 caractères ");
        }
        if (!isset($_POST["description"]) || strlen(trim($_POST["description"])) < 100) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer une DESCRIPTION de plus de 99 caractères");
        }
        if (!isset($_POST["activeTime"]) || !filter_var($_POST["activeTime"], FILTER_VALIDATE_FLOAT)) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un TEMPS DE PREPARATION au bon format");
        }
        if (!isset($_POST["bakingTime"]) || !filter_var($_POST["bakingTime"], FILTER_VALIDATE_FLOAT)) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un TEMPS DE CUISSON au bon format");
        }
        if (!isset($_POST["state"]) || $_POST["state"] == "-1" ) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez sélectioner un PAYS");
        }
        if (!isset($_POST["type"]) || $_POST["type"] == "-1" ) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez sélectioner un TYPE DE PLAT");
        }
        if (!isset($_POST["service"]) || !filter_var($_POST["service"], FILTER_VALIDATE_FLOAT)) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un NOMBRE DE PERSSONNES au bon format");
        }
        if ($error)
        {
            return["redirect"=>"resto_dish_create"];
        }
        else
        {
            $name           = trim($_POST["name"]);
            $description    = trim($_POST["description"]);
            $activeTime     = $_POST["activeTime"];
            $bakingTime     = $_POST["bakingTime"];
            $state          = $_POST["state"];
            $service        = $_POST["service"];
            $type           = $_POST["type"];

            $model = new DishModel();
            $id = $model->create($state, $name, $description, $activeTime, $bakingTime, $service, $type);

            $fileHelper= new FileHelper();
            if ($fileHelper->hasValidUploadedFile("img"))
            {
                $baseName = "dish_$id";
                $newName = $fileHelper->saveUploadFile("img",$baseName,"dish");
                $model->updateImage($id, $newName);
            }

            return ["redirect" => "resto_dish_list"];
        }
    }


    public function updateAction()
    {
        if (!UserSession::getInstance()->isAuthenticated())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        if (isset($_GET["id"]) && ctype_digit($_GET["id"]))
        {
            $model          = new DishModel();
            $modelState     = new StateModel();
            $modelType      = new TypeModel();
            $modelStep      = new StepsModel();
            $modelQte       = new QuantityModel();
            $modelIngre     = new IngredientModel();

            $states     = $modelState->findAll();
            $types      = $modelType->findAll();
            $ingre      = $modelIngre->findAll();
            $step       = $modelStep->findStepByDish($_GET['id']);
            $quantity   = $modelQte->findQuantityByDish($_GET['id']);
            $state      = $modelState->findStateByDish($_GET["id"]);
            $type       = $modelType->findTypeByDish($_GET["id"]);
            $dish       = $model->findOne($_GET["id"]);


            return [
                "template" =>
                    [
                        "folder" => "admin",
                        "file" => "dishedit",
                    ],
            "dish"=>$dish,       "admin"=>$admin, "states"=> $states, "step"=>$step, "ingre"=>$ingre,
            "state"=>$state,      "type"=>$type,   "types"=> $types, "quantity"=>$quantity,
                "neededScripts"=>
                    [
                        "uikit.js",
                        "ajaxRemove.js",
                    ],
            ];

        }

        if(isset($_POST["formDish"])) {
            $error = false;
            if (!isset($_POST["name"]) || strlen(trim($_POST["name"])) < 2) {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez entrer un Nom de plus de 2 caractères ");
            }
            if (!isset($_POST["description"]) || strlen(trim($_POST["description"])) < 100) {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez entrer une DESCRIPTION de plus de 99 caractères");
            }
            if (!isset($_POST["activeTime"]) || !filter_var($_POST["activeTime"], FILTER_VALIDATE_FLOAT)) {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez entrer un TEMPS DE PREPARATION au bon format");
            }
            if (!isset($_POST["bakingTime"]) || !filter_var($_POST["bakingTime"], FILTER_VALIDATE_FLOAT)) {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez entrer un TEMPS DE CUISSON au bon format");
            }
            if (!isset($_POST["state"]) || $_POST["state"] == "-1") {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez sélectioner un PAYS");
            }
            if (!isset($_POST["type"]) || $_POST["type"] == "-1") {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez sélectioner un TYPE DE PLAT");
            }
            if (!isset($_POST["service"]) || !filter_var($_POST["service"], FILTER_VALIDATE_FLOAT)) {
                $error = true;
                FlashBag::getInstance()->addMessage("Veuillez entrer un NOMBRE DE PERSSONNES au bon format");
            }
            if ($error && isset($_POST["id"])) {
                return [
                    "redirect" =>
                        [
                            "routeName" => "resto_dish_update",
                            "args" =>
                                [
                                    "id" => $_POST["id"],
                                ]
                        ],
                ];
            } else {
                $name = trim($_POST["name"]);
                $description = trim($_POST["description"]);
                $activeTime = $_POST["activeTime"];
                $bakingTime = $_POST["bakingTime"];
                $state = $_POST["state"];
                $service = $_POST["service"];
                $type = $_POST["type"];
                $dishId = $_POST["id"];
                $model = new DishModel();
                $dish = $model->findOne($_POST["id"]);
                $id = $model->update($dishId, $state, $name, $description, $activeTime, $bakingTime, $service, $type);


                FlashBag::getInstance()->addMessage("Le Plat '$name' est bien à jour");
                return [
                    "redirect" =>
                        [
                            "routeName" => "resto_dish_update",
                            "args" =>
                                [
                                    "id" => $_POST["id"],
                                ]
                        ],
                    "admin" => $admin,

                ];
            }
        }
        if (isset($_POST["submitImg"])){
            $model = new DishModel();
            $id = $_POST["id"];
            $dish = $model->findOne($_POST["id"]);
            $fileHelper = new FileHelper();
            if (isset($_POST["submitImg"]) || $fileHelper->hasValidUploadedFile("img")) {
                if ($dish["img"]) {
                    $fileHelper->removeImage($dish['img'], "dish");
                    if (!$fileHelper->hasValidUploadedFile("img")) {
                        $model->updateImage($id, "");
                    }
                }
            }
            if ($fileHelper->hasValidUploadedFile("img")) {
                $baseName = "dish_$id";
                $newName = $fileHelper->saveUploadFile("img", $baseName, "dish");
                $model->updateImage($id, $newName);
            }
            return [
                "redirect" =>
                    [
                        "routeName" => "resto_dish_update",
                        "args" =>
                            [
                                "id" => $_POST["id"],
                            ]
                    ],
                "admin" => $admin,
            ];
        }

    }

    public function deleteAction()
    {
        if (!UserSession::getInstance()->isAuthenticated())
        {
            return ["redirect" => "resto_home_main"];
        }

        if (isset($_GET["id"]) && ctype_digit($_GET["id"]) && UserSession::getInstance()->getUserId() == $_GET["id"] || UserSession::getInstance()->isAdmin()) {
            $model = new DishModel();
            $model->delete($_GET["id"]);

            return ["jsonResponse" => true,];

        }

    }

}