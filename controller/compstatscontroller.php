<?php
    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:./models/signin.db');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    $inputDate = Date("M/dd/yyyy");
    
    // obtain date of wanted history
    if(isset($_GET['inputDate'])){
        $inputDate = $_GET['inputDate'];
    }

    //get month's signins
    $getDateInput = "SELECT * FROM CompOut WHERE date LIKE '$inputDate%'";
    $getSelDateStats = $pdo->query($getDateInput);

    //delete a row
    if(isset($_GET['delete'])) {
        $inputDate = $_GET['inputDate'];
        $transid = $_GET['datesRow'];
        $delQuery = "DELETE FROM CompOut WHERE transid = '$transid'";
        $pdo->query($delQuery);
    };