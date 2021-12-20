<?php

abstract class AbstModel
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getPdo() ;
    }
}