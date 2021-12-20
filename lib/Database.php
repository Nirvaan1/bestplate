<?php

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        try {
        $this->pdo = new PDO(
                            "mysql:host=localhost:3308;dbname=bestplate;charset=UTF8",
                             "root",
                             "",
                                [
                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                ]
        );
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }



    public function getPdo()
    {
        return $this->pdo ;
    }

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}