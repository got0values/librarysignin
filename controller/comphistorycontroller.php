<?php
    require_once("./models/database.php");

    // get history between dates
    if (isset($_GET['dateSubmit'])) {
        $inputDate = $_GET['inputDate'];
        $inputDate2 = $_GET['inputDate2'];
        include_once("./models/compdateinput.php");
    }

    // delete history row
    if(isset($_GET['delete'])) {    
        include_once("./models/deletecompinput.php");
        include_once("./models/compdateinput.php");
    };