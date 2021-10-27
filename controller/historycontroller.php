<?php
    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:./models/signin.db');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    // get history between dates
    if (isset($_GET['dateSubmit'])) {
        $inputDate = $_GET['inputDate'];
        $inputDate2 = $_GET['inputDate2'];
        $getDateInput = "SELECT * FROM SignIn WHERE date BETWEEN '$inputDate' AND '$inputDate2'";
        $getSelDateStats = $pdo->query($getDateInput);
    }

    // delete history row
    if(isset($_GET['delete'])) {
        $inputDate = $_GET['inputDate'];
        $inputDate2 = $_GET['inputDate2'];
        $transid = $_GET['datesRow'];
        $delQuery = "DELETE FROM SignIn WHERE transid = '$transid'";
        $pdo->query($delQuery);
    };