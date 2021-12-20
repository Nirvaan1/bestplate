<?php

class HomeController
{
    public function mainAction()
    {
        $title = 'home';
        $modelState         = new StateModel();
        $modelPagination    = new PaginationModel();
        $modelDish          = new DishModel();
        $modelType          = new TypeModel();

        $allStates          = $modelState->findAll();
        $allDishesByPage    = $modelPagination->dishPagination();
        $allDishes          = $modelDish->findAll();
        $allType            = $modelType->findAll();

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
                        "folder" => "home",
                        "file" => "main" ,
                    ],
                    "allDishesByPage" => $allDishesByPage,
                    "totalPage" => $totalPage,
                    "pageCourant" => $pageCourant,
                    "state" => $allStates,
                    "allType" => $allType,
                    "title" => $title,

            ];

    }
}
