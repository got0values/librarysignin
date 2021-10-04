<?php
    $inputDate = $_GET['inputDate'];
    $inputDate2 = $_GET['inputDate2'];
    $transid = $_GET['datesRow'];
    $delQuery = "DELETE FROM SignIn WHERE transid = '$transid'";
    $pdo->query($delQuery);