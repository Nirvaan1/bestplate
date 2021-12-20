<?php


class StateController
{
    public function showOneAction()
    {
        $title = 'worldCuisine';
        $modelState = new StateModel();
        $modelComment   = new CommentModel();
        $allStates = $modelState->findAll();
        if (isset($_GET['pays']) AND ctype_digit($_GET['pays']) AND $_GET['pays'] <= count($allStates))
        {
            $allDishByState = $modelState->findDishByState($_GET['pays']);
            $state = $modelState->findOne($_GET['pays']);

            $modelPagination = new PaginationModel();
            $allCommentByPage = $modelPagination->commentPaginationForState($_GET["pays"]);
            $allComments = $modelComment->findCommentByState($_GET["pays"]);
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
                        "folder" => "state",
                        "file" => "showone",
                    ],
                "allDishByState"    => $allDishByState,
                "allCommentByPage"  => $allCommentByPage,
                "state"             => $state,
                "title"             => $title,
                "totalPage"         => $totalPage,
                "pageCourant"       => $pageCourant,
                "neededScripts"=>
                    [
                        "star.js",
                    ],

            ];
        }
        if($_POST)
        {
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
                            "routeName" => "resto_state_show",
                            "args" =>
                                [
                                    "pays" => $_GET["id"],
                                ]
                        ]
                ];
            }else{
                $description = trim($_POST["description"]);
                $stateId = $_POST["stateId"];
                $name = trim($_POST["name"]);
                $note = ($_POST["note"]);

                $modelComment->createCommentForState($description, $stateId, $name, $note);
                FlashBag::getInstance()->addMessage("Votre commentaire a bien été enregistrer ".$name." il est en cour de traitement...");

                return [
                    "redirect"=>
                        [
                            "routeName" => "resto_state_show",
                            "args" =>
                                [
                                    "pays" => $stateId,
                                ]
                        ]
                ];
            }
        }


    }
    public function showAllAction()
    {
        $title = 'worldCuisine';
        $modelPagination = new PaginationModel();
        $model = new DishModel();
        $allStateByPage = $modelPagination->statePagination();
        $allState = $model->findAll();
        $allStateNumber = count($allState);
        $totalPage = ceil($allStateNumber/12);

        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $allStateNumber) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }
        return [
            "template" =>
                [
                    "folder" => "state",
                    "file" => "showall",
                ],
            "allStateByPage" => $allStateByPage,
            "totalPage" => $totalPage,
            "pageCourant" => $pageCourant,
            "title" => $title,

        ];

    }

}
