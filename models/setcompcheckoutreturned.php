<?php
    $transID = $_POST['transID'];
    $checkbox = $_POST['checkbox'];
    $returnedQuery = "UPDATE CompOut SET returned = '$checkbox' WHERE transid = '$transID'";
    $pdo->exec($returnedQuery);