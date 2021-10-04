<?php
    $transidTwo = $_POST['deleteTrans'];               
    $deleteSigninQuery = "DELETE FROM CompOut WHERE transid = '$transidTwo'";
    $pdo->query($deleteSigninQuery);