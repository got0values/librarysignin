<?php

    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:./models/signin.db');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    

    

    