<?php
    $getDateInput = "SELECT * FROM SignIn WHERE date LIKE '$inputDate%'";
    $getSelDateStats = $pdo->query($getDateInput);