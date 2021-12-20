<?php


class StepsModel extends AbstModel
{
    public function findStepByDish($dishId)
    {
        $query = $this->pdo->prepare('SELECT *
                                                FROM Step
                                                WHERE dish_id = :dishId 
                                                ORDER BY num 
                                                 ');
        $query->execute(["dishId" => $dishId]);
        return $query->fetchAll();
    }

    public function create($dishId, $num, $description)
    {
        $query = $this->pdo->prepare("INSERT INTO Step
                                      (description, num, dish_id)
                                                VALUES 
                                      (:description, :num, :dishId)
                                      ");

        $query->execute([
            "dishId"        => $dishId,
            "num"           => $num,
            "description"   => $description,
        ]);

        return $this->pdo->lastInsertId();
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE
							                    FROM Step
							                    WHERE id = :id");
        $query->execute([
            "id" => $id,
        ]);
    }

}