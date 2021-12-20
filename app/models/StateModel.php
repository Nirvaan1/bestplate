<?php


class StateModel extends AbstModel
{
    public function findAll()
    {
        $resp = $this->pdo->query('SELECT *
                                            FROM State');
        return $resp->fetchAll();
    }

    public function findDishByState($stateId)
    {
        $query = $this->pdo->prepare('SELECT Dish.id as dishId, flag, lastname, forname, country,
                                                        AVG(note) as note, Dish.img, Dish.name, COUNT(note) as com
                                                FROM State
                                                INNER JOIN Dish
                                                ON State.id = stateId 
                                                INNER JOIN User
                                                ON Dish.userId = User.id  
                                                LEFT JOIN Comment
                                                ON Comment.dish_id = Dish.id
                                                WHERE stateId = :stateId
                                                 ');
        $query->execute(["stateId" => $stateId]);
        return $query->fetchAll();
    }
    public function findStateByDish($dishId)
    {
        $query = $this->pdo->prepare('SELECT *, State.id as idState
                                                FROM State
                                                INNER JOIN Dish
                                                ON State.id = stateId 
                                                WHERE Dish.id = :dishId
                                                 ');
        $query->execute(["dishId" => $dishId]);
        return $query->fetch();
    }


    public function findOne($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM State WHERE id= :id");
        $query->execute([ "id" => $id]);
        return $query->fetch();
    }

    public function findStateNumber()
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM State');
        return $resp->fetchAll();
    }
    public function create($country, $description, $flag)
    {
        $query = $this->pdo->prepare("INSERT INTO State
                                      (country, description, flag)
                                                VALUES 
                                      (:country, :description, :flag)
                                      ");
        $query->execute([
            "country"         => $country,
            "description"  => $description,
            "flag"         => $flag,
        ]);
        return $this->pdo->lastInsertId();
    }
    public function update($id, $country, $flag, $description)
    {
        $query = $this->pdo->prepare("UPDATE State
								                  SET country= :country,
								                   flag= :flag,
								                   description= :description
								                WHERE id= :id");

        $query -> execute([
            "id"           => $id,
            "flag"          => $flag,
            "country"      => $country,
            "description"  => $description,
        ]);
    }
    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE
							                    FROM State
							                    WHERE id = :id");
        $query->execute([
            "id" => $id,
        ]);
    }

}