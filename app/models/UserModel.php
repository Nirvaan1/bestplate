<?php

class UserModel extends AbstModel
{
    public function findAll()
    {
        $resp = $this->pdo->query('SELECT *
                                            FROM User');
        return $resp->fetchAll();
    }

    public function create($forname, $lastname, $email, $password )
    {
        $query = $this->pdo->prepare("INSERT INTO User
                                      (forname, lastname, email, pwd, signInDate)
                                                VALUES 
                                      (:forname, :lastname, :email, :pwd, NOW())");
        try {
            $query->execute([
                "forname" => $forname,
                "lastname" => $lastname,
                "email" => $email,
                "pwd" => password_hash($password, PASSWORD_DEFAULT)
            ]);
            return $this->pdo->lastInsertId();
        }
        catch(PDOException $e) {
            if ($e->getCode() == 23000)
            {
                throw new DomainException("cet Email est déja pris");
            }
            else
            {
                throw $e;
            }
        }

    }

    public function findEmailandCheckPassword($email, $password)
    {
        $query = $this->pdo->prepare("SELECT *
                                                FROM User
                                                WHERE email= :email");

        $query->execute([
            "email"=>$email,
        ]);

        $user = $query->fetch();

        if (!$user)
        {
            throw new DomainException("L'utilisateur n'est pas reconnue ?");
        }
        if (!password_verify($password, $user['pwd']))
        {
            throw new DomainException("Mot de passe inconnue");
        }

        return $user;
    }


}