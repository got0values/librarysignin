<?php
    require_once("./models/database.php");

    $inputDate = Date("M/dd/yyyy");
    
    // obtain date of wanted history
    if(isset($_GET['inputDate'])){
        $inputDate = $_GET['inputDate'];
    }

    //get month's signins
    include_once("./models/getcompinputdate.php");

    //delete a row
    if(isset($_GET['delete'])) {
        include_once("./models/deletecompstatsrow.php");
    };