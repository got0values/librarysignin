<?php
    // delete query and execution
    $transidTwo = $_POST['deleteTrans'];               
    $deleteSigninQuery = "DELETE FROM SignIn WHERE transid = '$transidTwo'";
    $pdo->query($deleteSigninQuery);