<?php
function reloadadd() {
    $DB = new DB();
    $cardQuery = "SELECT * FROM FMLTRACNameList";
    $cardQueryResult = $DB->select($cardQuery, array());
    include_once './views/add.php';
}
?>