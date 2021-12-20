<?php
class QuantityModel extends AbstModel
{
    public function findQuantityByDish($dishId)
    {
        $query = $this->pdo->prepare('SELECT *, Quantity.id as quantityId
                                                FROM Quantity
                                                INNER JOIN Ingredient
                                                ON quantity.ingredients_id = ingredient.id
                                                WHERE dish_id = :dishId 
                                                 ');
        $query->execute(["dishId" => $dishId]);
        return $query->fetchAll();
    }
    public function create($dishId, $qte, $ingredient)
    {
        $query = $this->pdo->prepare("INSERT INTO Quantity
                                      (dish_id, ingredients_id, qte )
                                                VALUES 
                                      (:dishId, :ingredient, :qte)
                                      ");

        $query->execute([
            "dishId"      => $dishId,
            "ingredient"  => $ingredient,
            "qte"         => $qte,
        ]);

        return $this->pdo->lastInsertId();
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE
							                    FROM Quantity
							                    WHERE id = :id");
        $query->execute([
            "id" => $id,
        ]);
    }

}