<?php
    // obtain card and name
    $inputPatronCard = $_POST['inputpatron'];
    $inputPatronName = $_POST['inputpatron2'];

    // query
    $addQuery = "INSERT INTO FMLTRACNameList (card, name) VALUES ('$inputPatronCard','$inputPatronName')";

    // execute pdo add query
    $pdo->query($addQuery);