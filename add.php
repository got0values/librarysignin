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


<div class="container input-group">
    <form action="" method="post">
        <label>Card:</label>
        <input type="text" name="inputpatron">
        <label>Name:</label>
        <input type="text" name="inputpatron2">
        <input class="btn btn-outline-secondary" name="namecardsubmit" value="Submit" type="submit">
    </form>
</div> 



<!-- <script type="text/javascript" src="add.js"></script> -->

<?php
    include_once 'footer.php';
?>