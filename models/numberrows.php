<?php
    // get the number of rows returned from the last statement to number rows
    $ctStatement = "SELECT COUNT(*) FROM SignIn WHERE date = DATE('now', 'localtime');";