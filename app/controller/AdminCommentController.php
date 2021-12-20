<?php

class AdminCommentController
{
    public function listAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }
        $admin = 1;
        $model = new CommentModel();
        $allComments =$model->findAll();
        return [
            "template" =>
                [
                    "folder" => "admin",
                    "file" => "commentlist",
                ],
            "admin"             => $admin,
            "allComments"       => $allComments,

            "neededScripts"=>
                [
                    "ajaxRemove.js",
                    "uikit.js",
                ],
        ];

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

    public function confirmAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }

        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {
            $model = new CommentModel();
            $model->confirmComment($_GET["id"]);
            FlashBag::getInstance()->addMessage("Le commentaire est Validé");
            return [
                "redirect" =>
                    [
                        "routeName" => "resto_comment_list",
                        "args" =>
                            [
                                "id" => $_GET["id"],
                            ]
                    ],
            ];
        }

    }

    public function deleteAction()
    {
        if (!UserSession::getInstance()->isAdmin())
        {
            return ["redirect" => "resto_home_main"];
        }

        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {
            $model = new CommentModel();
            $model->delete($_GET["id"]);

            return ["jsonResponse" => true,];
        }

    }

}