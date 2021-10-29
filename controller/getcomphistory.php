<?php
function getcomphistory() {
    $DB = new DB();
    $inputDate = $_POST['inputDate'];
    $inputDate2 = $_POST['inputDate2'];
    $getDateInput = "SELECT * FROM CompOut WHERE date BETWEEN '$inputDate' AND '$inputDate2'";
    $getSelDateStats = $DB->select($getDateInput, array());
    include_once './views/comphistory.php';
}
?>