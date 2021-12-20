<?php


class TypeModel extends AbstModel
{
    public function findAll()
    {
        $resp = $this->pdo->query('SELECT *
                                            FROM Meal_type');
        return $resp->fetchAll();
    }

    public function findTypeByDish($dishId)
    {
        $query = $this->pdo->prepare('SELECT *, Meal_Type.id as idType    
                                                FROM Meal_type
                                                INNER JOIN Dish
                                                ON Meal_type.id = mealTypeId 
                                                WHERE Dish.id = :dishId
                                                 ');
        $query->execute(["dishId" => $dishId]);
        return $query->fetch();
    }

    public function findOne($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM Meal_type WHERE id= :id");
        $query->execute([ "id" => $id]);
        return $query->fetch();
    }

}