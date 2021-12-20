<?php

class Router
{
    private $allUrls;
    private $rootUrl;
    private $wwwPath;
    private $localhostPath;
    private static $instance = null;
    private  $allRoutes =
    [
        //---------------- Home -----------//
        "/"=>
        [
            "controller"=>"Home",
            "method"=>"main",
            "name"=>"resto_home_main",
        ],

        //---------- DISH Show ------------//
        "/plat"=>
        [
            "controller"=>"Dish",
            "method"=>"showone",
            "name"=>"resto_dish_showone",
        ],
        //----------- DISH ShowAll --------//

         "/plats"=>
        [
            "controller"=>"Dish",
            "method"=>"showall",
            "name"=>"resto_dish_showall",
        ],
        //--------- DISH Search ---------//
        "/search"=>
            [
                "controller"=>"Dish",
                "method"=>"search",
                "name"=>"resto_dish_search",
            ],
        /////////////////////--STATE--////////////////////////
        //--------- STATE ShowOne ---------//
        "/pay"=>
            [
                "controller"=>"State",
                "method"=>"showOne",
                "name"=>"resto_state_show",
            ],
        //--------- STATE ShowAll ---------//
        "/pays"=>
            [
                "controller"=>"State",
                "method"=>"showAll",
                "name"=>"resto_state_showall",
            ],
        /////////////////////--TYPE--////////////////////////
        //--------- TYPE ShowOne ---------//
        "/type"=>
            [
                "controller"=>"Type",
                "method"=>"showOne",
                "name"=>"resto_type_show",
            ],
        /////////////////////--USER--////////////////////////
        //---------- USER Create ----------//
        "/profil/ajouter"=>
        [
            "controller"=>"User",
            "method"=>"create",
            "name"=>"resto_user_create",
        ],

        //---------- USER Login ----------//
        "/profil/connection"=>
        [
            "controller"=>"User",
            "method"=>"login",
            "name"=>"resto_user_login",
        ],

        //---------- USER Logout ----------//
        "/profil/deconnection"=>
        [
            "controller"=>"User",
            "method"=>"logout",
            "name"=>"resto_user_logout",
        ],
        /////////////////////--ADMIN--////////////////////////
        //---------- HOME ----------//
        "/admin/accueil"=>
            [
                "controller"=>"AdminHome",
                "method"=>"home",
                "name"=>"resto_admin_home",
            ],
        //---------- DISH List --------//
        "/admin/liste/plats"=>
            [
                "controller"=>"AdminDish",
                "method"=>"list",
                "name"=>"resto_dish_list",
            ],
        //---------- USER List --------//
        "/admin/liste/utilisateur"=>
            [
                "controller"=>"AdminUser",
                "method"=>"list",
                "name"=>"resto_user_list",
            ],
        //---------- COMMENT List --------//
        "/admin/liste/commentaire"=>
            [
                "controller"=>"AdminComment",
                "method"=>"list",
                "name"=>"resto_comment_list",
            ],
        //---------- STATE List --------//
        "/admin/liste/pays"=>
            [
                "controller"=>"AdminState",
                "method"=>"list",
                "name"=>"resto_state_list",
            ],
        //---------- INGREDIENT List --------//
        "/admin/liste/ingredient"=>
            [
                "controller"=>"AdminIngredient",
                "method"=>"list",
                "name"=>"resto_ingredient_list",
            ],
        //---------- DISH Create --------//
        "/admin/plat/ajouter"=>
            [
                "controller"=>"AdminDish",
                "method"=>"create",
                "name"=>"resto_dish_create",
            ],
        //---------- INGREDIENT Create --------//
        "/admin/ingredient/ajouter"=>
            [
                "controller"=>"AdminIngredient",
                "method"=>"create",
                "name"=>"resto_ingredient_create",
            ],
        //---------- STATE Create --------//
        "/admin/pays/ajouter"=>
            [
                "controller"=>"AdminState",
                "method"=>"create",
                "name"=>"resto_state_create",
            ],
        //--------- STEP Create ---------//
        "/admin/etape"=>
            [
                "controller"=>"Step",
                "method"=>"create",
                "name"=>"resto_step_create",
            ],
        //--------- QUANTITY Create ---------//
        "/admin/quantitée"=>
            [
                "controller"=>"Quantity",
                "method"=>"create",
                "name"=>"resto_quantity_create",
            ],

        //--------- DISH Update---------//
        "/admin/plat/modifier"=>
            [
                "controller"=>"AdminDish",
                "method"=>"update",
                "name"=>"resto_dish_update",
            ],
        //--------- STATE Update---------//
        "/admin/state/modifier"=>
            [
                "controller"=>"AdminState",
                "method"=>"update",
                "name"=>"resto_state_update",
            ],
        //--------- DISH Delete---------//
        "/admin/supprimer"=>
            [
                "controller"=>"AdminDish",
                "method"=>"delete",
                "name"=>"resto_dish_delete",
            ],

        //--------- STEP Delete ---------//
        "/admin/etape/supprimer"=>
            [
                "controller"=>"Step",
                "method"=>"delete",
                "name"=>"resto_step_delete",
            ],
        //--------- QUANTITY Delete---------//
        "/admin/quantité/supprimer"=>
            [
                "controller"=>"Quantity",
                "method"=>"delete",
                "name"=>"resto_quantity_delete",
            ],
        //--------- STATE Delete---------//
        "/admin/pays/supprimer"=>
            [
                "controller"=>"AdminState",
                "method"=>"delete",
                "name"=>"resto_state_delete",
            ],
        //--------- COMMENT Delete---------//
        "/admin/comment/supprimer"=>
            [
                "controller"=>"AdminComment",
                "method"=>"delete",
                "name"=>"resto_comment_delete",
            ],
        //--------- INGREDIENT Delete---------//
        "/admin/ingredient/supprimer"=>
            [
                "controller"=>"AdminIngredient",
                "method"=>"delete",
                "name"=>"resto_ingredient_delete",
            ],
        //--------- COMMENT confirm---------//
        "/admin/comment/confirmer"=>
                [
                    "controller"=>"AdminComment",
                    "method"=>"confirm",
                    "name"=>"resto_comment_confirm",
                ],
    ];



    public function __construct()
    {
        $this->rootUrl = $_SERVER["SCRIPT_NAME"];
        $this->wwwPath = dirname($this->rootUrl)."/www";
        $this->localhostPath = $_SERVER["DOCUMENT_ROOT"];
        $this->allUrls = [];
        foreach ($this->allRoutes as $url => $route)
        {
           $this->allUrls[$route["name"]] = $url;
        }

//        echo '<pre>'; print_r($_SERVER["DOCUMENT_ROOT"]);
//        die();
    }

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new Router();
        }

        return self::$instance;
    }

    public function getWwwPath($absolute = false)
    {
        if ($absolute)
        {
            return $this->localhostPath.$this->wwwPath;
        }
        else
        {
            return $this->wwwPath;
        }
    }

    public function getRoute($requestPath)
    {
        if (isset($this->allRoutes[$requestPath]))
        {
            return $this->allRoutes[$requestPath];
        }
        else
        {
            throw new ErrorException("pas de route trouver pour l'URL: \"$requestPath\"");
        }
    }

    public function generateUrl($routeName)
    {
        if (isset($this->allUrls[$routeName]))
        {
            return $this->rootUrl.$this->allUrls[$routeName];
        }
        else
        {
            throw new ErrorException("Pas de route  \"$routeName\" dans le routeur");
        }
    }

}
