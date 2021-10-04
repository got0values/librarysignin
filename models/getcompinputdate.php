<?php
    $getDateInput = "SELECT * FROM CompOut WHERE date LIKE '$inputDate%'";
    $getSelDateStats = $pdo->query($getDateInput);