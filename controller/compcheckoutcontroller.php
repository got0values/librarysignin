<?php
    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:./models/signin.db');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    // insert transaction into db
    if(isset($_POST['ptName'])) {
        $ptName = $_POST['ptName'];
        $comp = $_POST['comp'];
        $periph = $_POST['periph'];
        $compOutStatement = "INSERT into CompOut (name, time, date, computer, peripheral) VALUES ('$ptName', TIME('now', 'localtime'), DATE('now', 'localtime'), '$comp', '$periph');";
        $pdo->query($compOutStatement);
    }

    // list today's patron checkouts
    $getCurDateCompStats = "SELECT * FROM CompOut WHERE date = DATE('now', 'localtime');";
    $curDateCompStats = $pdo->query($getCurDateCompStats);

    // delete query and execution
    if(isset($_POST["deleteTwo"])) {
        $transidTwo = $_POST['deleteTrans'];               
        $deleteSigninQuery = "DELETE FROM CompOut WHERE transid = '$transidTwo'";
        $pdo->query($deleteSigninQuery);
    }

    // saved returned query
    if (isset($_POST['saveReturned'])) {
        $transID = $_POST['transID'];
        $checkbox = $_POST['checkbox'];
        $returnedQuery = "UPDATE CompOut SET returned = '$checkbox' WHERE transid = '$transID'";
        $pdo->exec($returnedQuery);
    }