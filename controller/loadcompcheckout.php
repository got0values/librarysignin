<?php
function loadcompcheckout() {
    // list today's patron checkouts
    $DB = new DB();
    $getCurDateCompStats = "SELECT * FROM CompOut WHERE date = DATE('now', 'localtime');";
    $curDateCompStats = $DB->select($getCurDateCompStats, array());;
    include_once './views/compcheckout.php';
}
?>