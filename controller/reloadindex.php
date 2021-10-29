<?php
function reloadindex() {
    $DB = new DB();
    //get today's signin data with newest at top
    $getTodayStatement = "SELECT * FROM SignIn WHERE date = DATE('now', 'localtime') ORDER BY time DESC;";
    $curDateStats = $DB->select($getTodayStatement, array());

    // get the number of rows returned from the last statement to number rows
    $ctStatement = "SELECT COUNT(*) FROM SignIn WHERE date = DATE('now', 'localtime');";
    $i = $DB->select($ctStatement, array());
    $i = $i[0][0];

    include_once './views/index2.php';
}
?>