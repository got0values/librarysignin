<?php
    //obtain all records for today
    $getCurDateStats = "SELECT * FROM SignIn WHERE date = DATE('now', 'localtime') ORDER BY transid DESC;";