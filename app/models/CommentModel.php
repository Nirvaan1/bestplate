<?php

class CommentModel extends AbstModel
{
    public function findAll()
    {
        $resp = $this->pdo->query('SELECT *
                                            FROM Comment');
        return $resp->fetchAll();
    }

    public function findCommentByDish($dishId)
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM Comment
                                            WHERE dish_id = '.$dishId);
        return $resp->fetchAll();
    }
    public function findCommentByState($stateId)
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM Comment
                                            WHERE state_id = '.$stateId);
        return $resp->fetchAll();
    }

    public function findCommentNumberForDish()
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM Comment
                                            WHERE dish_id');
        return $resp->fetchAll();
    }
    public function findCommentNumberForSate()
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM Comment
                                            WHERE state_id');
        return $resp->fetchAll();
    }
    public function findCommentNumberForState()
    {
        $resp = $this->pdo->query('SELECT id
                                            FROM Comment
                                            WHERE state_id');
        return $resp->fetchAll();
    }

    public function confirmComment($id)
    {
        $query = $this->pdo->prepare("UPDATE Comment 
								                SET statu = 'approuver'
								                WHERE id = :id");

        $query -> execute([
            "id" => $id,
        ]);
    }

    public function createCommentForDish($description, $dishId, $name, $note)
    {
        $query = $this->pdo->prepare("INSERT INTO Comment
                                      (description, dish_id, name, entity, date, statu, note)
                                                VALUES 
                                      (:description, :dish_id, :name, 'dish', NOW(), 'traitement', :note)
                                      ");

        $query->execute([
            "description"  => $description,
            "dish_id"      => $dishId,
            "name"         => $name,
            "note"         => $note,
        ]);

        return $this->pdo->lastInsertId();
    }

    public function createCommentForState($description, $state_id, $name, $note)
    {
        $query = $this->pdo->prepare("INSERT INTO Comment
                                      (description, state_id, name, entity, date, statu, note)
                                                VALUES 
                                      (:description, :state_id, :name, 'state', NOW(), 'traitement', :note)
                                      ");

        $query->execute([
            "description"  => $description,
            "state_id"      => $state_id,
            "name"         => $name,
            "note"         => $note,
        ]);

        return $this->pdo->lastInsertId();
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE
							                    FROM Comment
							                    WHERE id = :id");
        $query->execute([
            "id" => $id,
        ]);
    }

}