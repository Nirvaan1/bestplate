<?php


class DishModel extends AbstModel
{
    public function findAll()
    {
        $resp = $this->pdo->query('SELECT *
                                            FROM Dish
                                            INNER JOIN State
                                            ON Dish.stateId = State.id');
        return $resp->fetchAll();
    }
    public function findRecipeByUser($userId)
    {
        $query = $this->pdo->prepare("SELECT Dish.id as dishId, COUNT(userId) as numberRecipe
                                                FROM Dish
                                                INNER JOIN User
                                                ON Dish.userId = User.id 
                                                WHERE userId = :userId");
        $query->execute([ "userId" => $userId]);
        return $query->fetch();
    }

    public function findOne($id)
    {
        $query = $this->pdo->prepare("SELECT Dish.id as dishId, lastname, forname, Dish.description, Dish.activeTime,Dish.bakingTime, Dish.service,
                                                AVG(note) as note, Dish.img, Dish.name, COUNT(note) as com, userId
                                                FROM Dish
                                                INNER JOIN User
                                                ON Dish.userId = User.id  
                                                LEFT JOIN Comment
                                                ON Comment.dish_id = Dish.id
                                                WHERE Dish.id= :id");
        $query->execute([ "id" => $id]);
        return $query->fetch();
    }


    public function create($stateId, $name, $description, $activeTime, $bakingTime, $service, $mealTypeId)
    {
        $query = $this->pdo->prepare("INSERT INTO Dish
                                      (stateId, name, description, activeTime, bakingTime, service, mealTypeId, img)
                                                VALUES 
                                      (:stateId, :name, :description, :activeTime, :bakingTime, :service, :mealTypeId, '')
                                      ");

        $query->execute([
                        "stateId"      => $stateId,
                        "name"         => $name,
                        "description"  => $description,
                        "activeTime"   => $activeTime,
                        "bakingTime"   => $bakingTime,
                        "service"      => $service,
                        "mealTypeId"   => $mealTypeId,
                        ]);

        return $this->pdo->lastInsertId();
    }

    public function update($id,$stateId, $name, $description, $activeTime, $bakingTime, $service, $mealTypeId)
    {
        $query = $this->pdo->prepare("UPDATE Dish 
								                  SET name=:name,
                                                    mealTypeId=:mealTypeId,
								                    stateId= :stateId,
								                    description= :description,
								                    activeTime= :activeTime,
                                                    bakingTime= :bakingTime,
                                                    service=:service
								                WHERE id= :id");

        $query -> execute([
                        "id"           => $id,
                        "stateId"      => $stateId,
                        "name"         => $name,
                        "description"  => $description,
                        "activeTime"   => $activeTime,
                        "bakingTime"    => $bakingTime,
                        "service"      => $service,
                        "mealTypeId"   => $mealTypeId,
                        ]);
    }

    public function updateImage($id, $img)
    {
        $query = $this->pdo->prepare("UPDATE Dish 
								                SET img = :img
								                WHERE id = :id");

        $query -> execute([
                        "id" => $id,
                        "img" => $img,
                            ]);
    }


    public function findDishNumber()
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM Dish');
        return $resp->fetchAll();
    }

    public function findDishByUser($userId)
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM Dish
                                            WHERE userId = '.$userId);
        return $resp->fetchAll();
    }

    public function searchDish($q)
    {
        $query = $this->pdo->query("SELECT Dish.id as dishId, flag, lastname, forname, country,
                                                AVG(note) as note, Dish.img, Dish.name, COUNT(note) as com
                                  FROM Dish
                                  INNER JOIN State
                                  ON Dish.stateId = State.id
                                  INNER JOIN User
                                  ON Dish.userId = User.id 
                                  LEFT JOIN Comment
                                  ON Comment.dish_id = Dish.id
                                  WHERE Dish.name LIKE '%"."$q"."%'
                                  GROUP BY Dish.id
                                  LIMIT 20");

        return $query->fetchAll();
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE
							                    FROM Dish
							                    WHERE id = :id");
        $query->execute([
            "id" => $id,
        ]);
    }



}