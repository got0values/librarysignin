<?php
    $ptName = $_POST['ptName'];
    $comp = $_POST['comp'];
    $periph = $_POST['periph'];
    $compOutStatement = "INSERT into CompOut (name, time, date, computer, peripheral) VALUES ('$ptName', TIME('now', 'localtime'), DATE('now', 'localtime'), '$comp', '$periph');";
    $pdo->query($compOutStatement);