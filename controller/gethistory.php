<?php
function gethistory() {
    $DB = new DB();
    $inputDate = $_POST['inputDate'];
    $inputDate2 = $_POST['inputDate2'];
    $getDateInput = "SELECT * FROM SignIn WHERE date BETWEEN '$inputDate' AND '$inputDate2'";
    $getSelDateStats = $DB->select($getDateInput, array());
    include_once './views/history.php';
}
?>