<?php
    include_once 'header.php';
?>

<title>Sign In</title>

<h2 class="text-center mb-5">Sign In</h2>

<?php
if (isset($_POST["bcSubmit"])) {
    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:signin.db');

        // obtain name from barcode number
        $bcNum = $_POST['bcNum'];
        $getNameStatement = "SELECT name FROM FMLTRACNameList WHERE card = '$bcNum';";
        $results = $pdo->query($getNameStatement);
        foreach ($results as $row) {
            $newName = $row[0];
        }   
        
        // insert transaction into db
        $signInStatement = "INSERT into SignIn (card, name, time, date, notes) VALUES ('$bcNum', '$newName', TIME('now', 'localtime'), DATE('now', 'localtime'), NULL);";
        $pdo->query($signInStatement);

    }catch (PDOException $e) {
        echo $e -> getMessage();
    }
}
?>

<div class="container input-group">
    <form action="index.php" method="post">
        <input type="text" name="bcNum" class="form-control" placeholder="Barcode" id="bcInput">
        <input class="btn btn-outline-secondary" name="bcSubmit" value="Submit" type="submit">
    </form>
</div> 

<table class="table table-hover container">
  <thead>
    <tr>
        <th scope="col">Barcode</th>
        <th scope="col">Name</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody id="tBody">
    <?php
        $pdo = new PDO('sqlite:signin.db');
        // $pdo->query($cardQuery);
        $getCurDateStats = "SELECT * FROM SignIn WHERE date = DATE('now', 'localtime');";
        $curDateStats = $pdo->query($getCurDateStats);
        foreach ($curDateStats as $cdsRow) {
            echo 
            "<tr>
                <td>" . $cdsRow[1] . "</td><td>" . $cdsRow[2] . "</td><td>" . $cdsRow[3] . "</td><td>" . $cdsRow[4] . "</td>
            </tr>";
        }
    ?>
  </tbody>
</table>


<script type="text/javascript" src="signin.js"></script>

<?php
    include_once 'footer.php';
?>