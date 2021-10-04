<?php

    require_once("./models/database.php");

    // list today's patrons query in descending order to show latest at top
    include_once("./models/getcurdatestats.php");
    $curDateStats = $pdo->query($getCurDateStats);

    // obtain name from barcode number
    if (isset($_POST["bcSubmit"])) {
        include_once("./models/bcsubmit.php"); 
    }

    // delete query and execution
    if(isset($_POST["deleteTwo"])) {
        include_once("./models/deletesignin.php");
    }

    // add notes query and execution
    if (isset($_POST['notesButton'])) {
        include_once("./models/addnotes.php");
    }

    // get the number of rows returned from the last statement to number rows
    include_once("./models/numberrows.php");
    $ctStatementQuery = $pdo->query($ctStatement);
    $i = $ctStatementQuery->fetchColumn();

    

    