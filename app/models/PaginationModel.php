<?php
class PaginationModel extends AbstModel
{
    public function dishPagination()
    {
        $model = new DishModel();
        $numberDish = $model->findDishNumber();
        $dishByPage = 12;
        $dishTotal = count($numberDish);
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $dishTotal) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }
        $start = ($pageCourant - 1)*$dishByPage;
            $resp = $this->pdo->query('SELECT Dish.id as dishId, flag, lastname, forname, country,
                                                AVG(note) as note, Dish.img, Dish.name, COUNT(note) as com
                                                FROM Dish
                                                INNER JOIN State
                                                ON Dish.stateId = State.id
                                                INNER JOIN User
                                                ON Dish.userId = User.id 
                                                LEFT JOIN Comment
                                                ON Comment.dish_id = Dish.id
                                                GROUP BY Dish.id
                                            ORDER BY Dish.id DESC LIMIT '.$start.','.$dishByPage);
        return $resp->fetchAll();
    }
    public function dishPaginationAdmin($userId)
    {
        $model = new DishModel();
        $numberDish = $model->findDishNumber();
        $dishByPage = 12;
        $dishTotal = count($numberDish);
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $dishTotal) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }
        $start = ($pageCourant - 1)*$dishByPage;
        $resp = $this->pdo->query('SELECT *, Dish.id as dishId
                                            FROM Dish
                                            INNER JOIN State
                                            ON Dish.stateId = State.id
                                            WHERE userId = '.$userId.'
                                            ORDER BY dishId DESC LIMIT '.$start.','.$dishByPage);
        return $resp->fetchAll();
    }

    public function commentPaginationForDish($dishId)
    {
        $model = new CommentModel();
        $numberComment = $model->findCommentNumberForDish();
        $commentByPage = 2;
        $commentTotal = count($numberComment);
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $commentTotal) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }
        $start = ($pageCourant - 1)*$commentByPage;

        $resp = $this->pdo->query('SELECT *, Dish.id as dishId, Comment.name as nameCom, Comment.description as descripCom
                                            FROM Comment
                                            INNER JOIN Dish
                                            ON Dish.id = Comment.dish_id
                                            WHERE Comment.dish_id = '.$dishId.'
                                            ORDER BY dishId DESC LIMIT '.$start.','.$commentByPage);
        return $resp->fetchAll();
    }

    public function commentPaginationForState($stateId)
    {
        $model = new CommentModel();
        $numberComment = $model->findCommentNumberForState();
        $commentByPage = 2;
        $commentTotal = count($numberComment);
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $commentTotal) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }
        $start = ($pageCourant - 1)*$commentByPage;

        $resp = $this->pdo->query('SELECT *, State.id as stateId, Comment.name as nameCom, Comment.description as descripCom
                                            FROM Comment
                                            INNER JOIN State
                                            ON State.id = Comment.state_id
                                            WHERE Comment.state_id = '.$stateId.'
                                            ORDER BY stateId DESC LIMIT '.$start.','.$commentByPage);
        return $resp->fetchAll();
    }

    public function statePagination()
    {
        $model = new StateModel();
        $numberState = $model->findStateNumber();
        $stateByPage = 12;
        $stateTotal = count($numberState);
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $stateTotal) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }
        $start = ($pageCourant - 1)*$stateByPage;
        $resp = $this->pdo->query('SELECT *
                                            FROM State
                                            ORDER BY id DESC LIMIT '.$start.','.$stateByPage);
        return $resp->fetchAll();
    }

    public function typePagination($mealTypeId)
    {
        $model = new StateModel();
        $numberState = $model->findStateNumber();
        $stateByPage = 12;
        $stateTotal = count($numberState);
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $stateTotal) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }
        $start = ($pageCourant - 1)*$stateByPage;
        $query = $this->pdo->prepare('SELECT *
                                            FROM Meal_type
                                            INNER JOIN Dish
                                            ON Dish.mealTypeId = Meal_type.id
                                            INNER  JOIN State
                                            WHERE Dish.mealTypeId= :mealTypeId
                                            ORDER BY Dish.id DESC LIMIT '.$start.','.$stateByPage);
        $query->execute([ "mealTypeId" => $mealTypeId]);
        return $query->fetchAll();
    }

    public function ingredientPagination()
    {
        $model = new IngredientModel();
        $numberIngredient = $model->findStateNumber();
        $ingredientByPage = 12;
        $ingredientTotal = count($numberIngredient);
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $ingredientTotal) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourant = $_GET['page'];
        }else{
            $pageCourant = 1;
        }
        $start = ($pageCourant - 1)*$ingredientByPage;
        $resp = $this->pdo->query('SELECT *
                                            FROM Ingredient
                                            ORDER BY id DESC LIMIT '.$start.','.$ingredientByPage);
        return $resp->fetchAll();
    }

}



