<?php
    $inputDate = $_GET['inputDate'];
    $inputDate2 = $_GET['inputDate2'];
    $getDateInput = "SELECT * FROM CompOut WHERE date BETWEEN '$inputDate' AND '$inputDate2'";
    $getSelDateStats = $pdo->query($getDateInput); 