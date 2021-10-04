<?php

    // obtain name from barcode number
    $bcNum = $_POST['bcNum'];
    $getNameStatement = "SELECT name FROM FMLTRACNameList WHERE card = '$bcNum'";
    $results = $pdo->query($getNameStatement);
    $row = $results->fetch();
    $rowZero = $row[0];
    $signInStatement = "INSERT into SignIn (card, name, time, date, notes) VALUES ('$bcNum', '$rowZero', TIME('now', 'localtime'), DATE('now', 'localtime'), NULL);";
    $pdo->query($signInStatement);
    

    