<?php

class TypeController
{
    public function showOneAction()
    {
        if (isset($_GET["type"]) && ctype_digit($_GET["type"])){
            $modelPagination = new PaginationModel();
            $modelType = new TypeModel();
            $allTypesByPage = $modelPagination->typePagination($_GET['type']);
            $allTypes = $modelType->findAll();
            $type = $modelType->findOne($_GET["type"]);
            $allTypesNumber = count($allTypes);
            $totalPage = ceil($allTypesNumber / 12);

            if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $allTypesNumber) {
                $_GET['page'] = intval($_GET['page']);
                $pageCourant = $_GET['page'];
            } else {
                $pageCourant = 1;
            }
            return [
                "template" =>
                    [
                        "folder" => "type",
                        "file" => "showone",
                    ],
                "allTypesByPage"    => $allTypesByPage,
                "totalPage"         => $totalPage,
                "pageCourant"       => $pageCourant,
                "type"              => $type,
            ];

        }else{
            return ["redirect" => "resto_home_main"];
        }


    }

}

