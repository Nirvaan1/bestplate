<?php

class AdminStateController
{
    public function listAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        $modelPagination = new PaginationModel();
        $modelState = new StateModel();
        $allSTatesByPage = $modelPagination->statePagination();
        $allSates = $modelState->findAll();
        $allStatesNumber = count($allSates);
        $totalPage = ceil($allStatesNumber/12);

        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $allStatesNumber) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }

        return [
            "template" =>
                [
                    "folder" => "admin",
                    "file" => "statelist",
                ],
            "allSTatesByPage"   => $allSTatesByPage,
            "totalPage"         => $totalPage,
            "pageCourant"       => $pageCourant,
            "admin"             => $admin,

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
        $modelState = new StateModel();
        $states = $modelState->findAll();

        if (!$_POST) {
            return [
                "template" =>
                    [
                        "folder" => "admin",
                        "file" => "stateadd",
                    ],
                "admin" => $admin,
                "states" => $states,
            ];

        }
        $allLinks = [];
        foreach ($states as $country) {
            $allLinks[].= $country["flag"];
        }
        $error = false;
        if (!isset($_POST["country"])  || strlen(trim($_POST["country"])) < 2) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un Pays de plus de 2 caractères ");
        }
        if (!isset($_POST["description"]) || strlen(trim($_POST["description"])) < 100) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer une DESCRIPTION de plus de 99 caractères");
        }
        if (!isset($_POST["flag"]) || stristr($_POST["flag"],"https://www.countryflags.io/") == FALSE) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un LIENS provenant du site 'https://www.countryflags.io/'");
        }
        if (in_array($_POST["flag"],$allLinks)) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Le pays est déjà créé");
        }
        if ($error)
        {
            return["redirect"=>"resto_state_create"];
        }
        else
        {
            $country        = trim($_POST["country"]);
            $description    = trim($_POST["description"]);
            $flag           = $_POST["flag"];

            $model = new StateModel();
            $model->create($country, $description, $flag);

            FlashBag::getInstance()->addMessage("Le Pays '$country' est ajouté");
            return ["redirect" => "resto_state_list"];
        }
    }


    public function updateAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        if (isset($_GET["id"]) && ctype_digit($_GET["id"]))
        {
            $modelState     = new StateModel();
            $state      = $modelState->findOne($_GET["id"]);

            return [
                "template" =>
                    [
                        "folder" => "admin",
                        "file" => "stateedit",
                    ],
                "admin"=>$admin,
                "state"=> $state,
            ];

        }
        if ($_POST){
        $error = false;
        if (!isset($_POST["country"])  || strlen(trim($_POST["country"])) < 2) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un Pays de plus de 2 caractères ");
        }
        if (!isset($_POST["description"]) || strlen(trim($_POST["description"])) < 100) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer une DESCRIPTION de plus de 99 caractères");
        }
        if (!isset($_POST["flag"]) || stristr($_POST["flag"],"https://www.countryflags.io/") == FALSE) {
            $error = true ;
            FlashBag::getInstance()->addMessage("Veuillez entrer un LIENS provenant du site 'https://www.countryflags.io/'");
        }
            if ($error && isset($_POST["id"])) {
                return [
                    "redirect" =>
                        [
                            "routeName" => "resto_state_update",
                            "args" =>
                                [
                                    "id" => $_POST["id"],
                                ]
                        ],
                    "admin" => $admin,

                ];
            } else {
                $country = trim($_POST["country"]);
                $description = trim($_POST["description"]);
                $flag = $_POST["flag"];
                $id = $_POST["id"];
                $model = new StateModel();
                $model->update($id, $country, $flag, $description);


                FlashBag::getInstance()->addMessage("Le Pays '$country' est bien à jour");
                return ["redirect" => "resto_state_list"];
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
            $model = new StateModel();
            $model->delete($_GET["id"]);
            return ["jsonResponse" => true,];
        }

    }




}