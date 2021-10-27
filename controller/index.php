<?php

    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:./models/signin.db');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    // list today's patrons query in descending order to show latest at top
    //obtain all records for today
    $getCurDateStats = "SELECT * FROM SignIn WHERE date = DATE('now', 'localtime') ORDER BY transid DESC;";
    $curDateStats = $pdo->query($getCurDateStats);

    // obtain name from barcode number
    if (isset($_POST["bcSubmit"])) {
        $bcNum = $_POST['bcNum'];
        $getNameStatement = "SELECT name FROM FMLTRACNameList WHERE card = '$bcNum'";
        $results = $pdo->query($getNameStatement);
        $row = $results->fetch();
        $rowZero = $row[0];
        $signInStatement = "INSERT into SignIn (card, name, time, date, notes) VALUES ('$bcNum', '$rowZero', TIME('now', 'localtime'), DATE('now', 'localtime'), NULL);";
        $pdo->query($signInStatement); 
    }

    // delete query and execution
    if(isset($_POST["deleteTwo"])) {
        $transidTwo = $_POST['deleteTrans'];               
        $deleteSigninQuery = "DELETE FROM SignIn WHERE transid = '$transidTwo'";
        $pdo->query($deleteSigninQuery);
    }

    // add notes query and execution
    if (isset($_POST['notesButton'])) {
        $notesText = $_POST['notesText'];
        $transIdThree = $_POST['transIdThree'];
        $addNotesQuery = "UPDATE SignIn SET notes = '$notesText' WHERE transid = '$transIdThree'";
        $pdo->exec($addNotesQuery);
    }

    // get the number of rows returned from the last statement to number rows
    $ctStatement = "SELECT COUNT(*) FROM SignIn WHERE date = DATE('now', 'localtime');";
    $ctStatementQuery = $pdo->query($ctStatement);
    $i = $ctStatementQuery->fetchColumn();

    

    