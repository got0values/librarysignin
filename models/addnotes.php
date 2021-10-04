<?php
    // add notes query and execution
    $notesText = $_POST['notesText'];
    $transIdThree = $_POST['transIdThree'];
    $addNotesQuery = "UPDATE SignIn SET notes = '$notesText' WHERE transid = '$transIdThree'";
    $pdo->exec($addNotesQuery);