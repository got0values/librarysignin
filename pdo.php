<?php

try{
    $pdo = new PDO('sqlite:signin.db');
    $bcNum = $_POST['bcNum'];
    $getNameStatement = "SELECT name FROM FMLTRACNameList WHERE card = '$bcNum' + '.0';";
    $results = $pdo->query($getNameStatement);
    foreach ($results as $row) {
        $newName = $row[0];
    }
    $siginInStatement = "INSERT into SignIn VALUES ('$newName', CURRENT_TIMESTAMP, GETDATE(), NULL);";
    $pdo->query($signInStatement);
}catch (PDOException $e) {
    echo $e -> getMessage();
}