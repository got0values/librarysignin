<?php
    require_once("./models/database.php");

    // obtain card number and name from input then add to database
    if (isset($_POST["namecardsubmit"])) {
        include_once("./models/addcard.php");
    }

    // list query
    include_once("./models/allcards.php");
    // execute pdo list query
    $cardQueryResult = $pdo->query($cardQuery);

    // delete query and execution
    if (isset($_POST['deletePatronButton'])) {
        include_once("./models/deletecard.php");
    }