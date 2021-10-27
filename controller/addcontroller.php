<?php
    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:./models/signin.db');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    // obtain card number and name from input then add to database
    if (isset($_POST["namecardsubmit"])) {
        // obtain card and name
        $inputPatronCard = $_POST['inputpatron'];
        $inputPatronName = $_POST['inputpatron2'];

        // query
        $addQuery = "INSERT INTO FMLTRACNameList (card, name) VALUES ('$inputPatronCard','$inputPatronName')";

        // execute pdo add query
        $pdo->query($addQuery);
    }

    // list query
    $cardQuery = "SELECT * FROM FMLTRACNameList";
    // execute pdo list query
    $cardQueryResult = $pdo->query($cardQuery);

    // delete query and execution
    if (isset($_POST['deletePatronButton'])) {
        $patronCard = $_POST['patronCard'];
        $deleteQuery = "DELETE FROM FMLTRACNameList WHERE card = '$patronCard'";
        $pdo->exec($deleteQuery); 
    }