<?php
    require_once("./models/database.php");

    // insert transaction into db
    if(isset($_POST['ptName'])) {
        include_once("./models/compcheckout.php");
    }

    // list today's patron checkouts
    include_once("./models/listcompcheckout.php");
    $curDateCompStats = $pdo->query($getCurDateCompStats);

    // delete query and execution
    if(isset($_POST["deleteTwo"])) {
        include_once("./models/deletecompcheckout.php");
    }

    // saved returned query
    if (isset($_POST['saveReturned'])) {
        include_once("./models/setcompcheckoutreturned.php");
    }