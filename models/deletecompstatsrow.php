<?php
    $inputDate = $_GET['inputDate'];
    $transid = $_GET['datesRow'];
    $delQuery = "DELETE FROM CompOut WHERE transid = '$transid'";
    $pdo->query($delQuery);
    