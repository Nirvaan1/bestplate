<?php

$pdo = new PDO(
    "mysql:host=localhost:3308;dbname=bestplate;charset=UTF8",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

if(isset($_GET['search'])){
    $search = (String) trim($_GET['search']);

    $query = $pdo->query("SELECT *
                                  FROM Dish
                                  WHERE name LIKE '%"."$search"."%'
                                  LIMIT 10");

    $req = $query->fetchAll();

    foreach($req as $r){
        ?>
        <div style="margin-top: 20px; border-bottom: 1px solid #ccc; text-align: center">
            <a href="plat?id=<?=$r['id']?>"><?= $r['name'] ?></a>
        </div>
        <?php
    }
}