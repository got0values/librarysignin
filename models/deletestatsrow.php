<?php
    $inputDate = $_GET['inputDate'];
    $transid = $_GET['datesRow'];
    $delQuery = "DELETE FROM SignIn WHERE transid = '$transid'";
    $pdo->query($delQuery);
    