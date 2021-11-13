<?php
function reloadaddnocard() {
    $DB = new DB();
    $noCardQuery = "SELECT * FROM FMLTRACNoCardList";
    $noCardQueryResult = $DB->select($noCardQuery, array());
    include_once './views/nocardlist.php';
}
?>