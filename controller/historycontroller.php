<?php
    require_once("./models/database.php");

    // get history between dates
    if (isset($_GET['dateSubmit'])) {
        $inputDate = $_GET['inputDate'];
        $inputDate2 = $_GET['inputDate2'];
        include_once("./models/dateinput.php");
    }

    // delete history row
    if(isset($_GET['delete'])) {
        include_once("./models/deletedateinput.php");
        include_once("./models/dateinput.php");
    };