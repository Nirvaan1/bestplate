<?php


class IngredientModel extends AbstModel
{
    public function findIngredientByQuantity($ingredientId)
    {
        $query = $this->pdo->prepare('SELECT *
                                                FROM Ingredient
                                                WHERE Ingredient_id = :ingredientId 
                                                 ');
        $query->execute(["ingredientId" => $ingredientId]);
        return $query->fetchAll();
    }
    public function findAll()
    {
        $resp = $this->pdo->query('SELECT *
                                            FROM Ingredient');
        return $resp->fetchAll();
    }

    public function findStateNumber()
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM Ingredient');
        return $resp->fetchAll();
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE
							                    FROM Ingredient
							                    WHERE id = :id");
        $query->execute([
            "id" => $id,
        ]);
    }

    public function create($name, $unit, $img)
    {
        $query = $this->pdo->prepare("INSERT INTO Ingredient
                                      (name, unit, img)
                                                VALUES 
                                      (:name, :unit, :img)
                                      ");
        $query->execute([
            "name"  => $name,
            "unit"  => $unit,
            "img"   => $img,
        ]);
        return $this->pdo->lastInsertId();
    }
}