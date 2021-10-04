<?php
    $patronCard = $_POST['patronCard'];
    $deleteQuery = "DELETE FROM FMLTRACNameList WHERE card = '$patronCard'";
    $pdo->exec($deleteQuery); 