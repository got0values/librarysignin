<?php
    include_once 'header.php';
?>

<title>Add Card</title>

<h2 class="text-center mb-5">Add Card</h2>

<?php
if (isset($_POST["namecardsubmit"])) {
    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:signin.db');

        // obtain card and name
        $inputPatronCard = $_POST['inputpatron'];
        $inputPatronName = $_POST['inputpatron2'];

        // query
        $addQuery = "INSERT INTO FMLTRACNameList (card, name) VALUES ('$inputPatronCard','$inputPatronName')";

        // execute pdo add query
        $pdo->query($addQuery);

    }catch (PDOException $e) {
        echo $e -> getMessage();
    }
}
?>


<div class="container input-group mb-3">
    <form action="" method="post">
        <label>Card:</label>
        <input type="text" name="inputpatron">
        <label>Name:</label>
        <input type="text" name="inputpatron2">
        <input class="btn btn-outline-secondary" name="namecardsubmit" value="Submit" type="submit">
    </form>
</div> 

<?php
    $pdo = new PDO('sqlite:signin.db');

    // list query
    $cardQuery = "SELECT * FROM FMLTRACNameList";
    // execute pdo list query
    $cardQueryResult = $pdo->query($cardQuery);

    // delete query and execution
    if (isset($_POST['deletePatronButton'])) {
        $patronCard = $_POST['patronCard'];
        $deleteQuery = "DELETE FROM NameList WHERE card = '$patronCard'";
        $pdo->exec($deleteQuery);        
    }

    echo "<table class='table table-hover container'>";
    echo "<th class='text-center'></th><th class='text-center'></th><th class='text-center'>" . 'Barcode' . "</th><th class='text-center'>" . 'Name' . "</th>";
    echo "<tbody>";
    $i = 1; 
    foreach($cardQueryResult as $cardRow) {
        echo "<tr>";
        echo "<td>" . $i++ . "</td>";
        echo 
        "<td class='text-center'><form action='add.php' method='post'>
            <input type='submit' name='deletePatronButton' class='btn btn-danger btn-sm' value='Delete'>
            <input type='hidden' name='patronCard' value='$cardRow[0]'>
        </form></td>";
        echo "<td class='text-center'>" . $cardRow[0] . "</td><td class='text-center'>" . $cardRow[1] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
?>


<!-- <script type="text/javascript" src="add.js"></script> -->

<?php
    include_once 'footer.php';
?>