<?php

try{
    // connect to sqlitedb
    $pdo = new PDO('sqlite:signin.db');

    $transid = $datesRow[3];
    $delQuery = "DELETE FROM SignIn WHERE transid = '$transid'";
    $pdo->query($delQuery);

}catch (PDOException $e) {
    echo $e -> getMessage();
}