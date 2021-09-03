<?php
    include_once 'header.php';
    
    ini_set('display_errors',1);
    error_reporting(-1);

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
        $row = $results->fetch();
        $rowZero = $row[0];
        // foreach ($results as $row) {
        //     $newName = $row[0];
        // }   
        
        // insert transaction into db
        $signInStatement = "INSERT into SignIn (card, name, time, date, notes) VALUES ('$bcNum', '$rowZero', TIME('now', 'localtime'), DATE('now', 'localtime'), NULL);";
        $pdo->query($signInStatement);

    }catch (PDOException $e) {
        echo $e -> getMessage();
    }
}
?>

<div class="container input-group mb-3">
    <form action="index.php" method="post">
        <input type="text" name="bcNum" placeholder="Barcode" id="bcInput" autofocus>
        <input class="btn btn-outline-secondary" name="bcSubmit" value="Submit" type="submit">
    </form>
</div> 

<table class="table table-hover container">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Delete</th>
        <th scope="col">Barcode</th>
        <th scope="col">Name</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
        <th scope="col">Notes</th>
    </tr>
  </thead>
  <tbody id="tBody">
    <?php
        $pdo = new PDO('sqlite:signin.db');
        // $pdo->query($cardQuery);

        // delete query and execution
        if(isset($_POST["deleteTwo"])) {
            $transidTwo = $_POST['deleteTrans'];               
            $deleteSigninQuery = "DELETE FROM SignIn WHERE transid = '$transidTwo'";
            $pdo->query($deleteSigninQuery);
        }

        // add notes query and execution
        if (isset($_POST['notesButton'])) {
            $notesText = $_POST['notesText'];
            $transIdThree = $_POST['transIdThree'];
            $addNotesQuery = "UPDATE SignIn SET notes = '$notesText' WHERE transid = '$transIdThree'";
            $pdo->exec($addNotesQuery);
        }

        // list today's patrons query
        $getCurDateStats = "SELECT * FROM SignIn WHERE date = DATE('now', 'localtime');";
        $curDateStats = $pdo->query($getCurDateStats);
        $i = 1;
        foreach ($curDateStats as $cdsRow) {
            echo 
            "<tr>
                <td>" . $i++ . "</td>
                <td> 
                <form action='index.php' method='post'>
                    <input type='submit' name='deleteTwo' value='Delete' class='btn btn-danger btn-sm' value='Delete'>
                    <input type='hidden' name='deleteTrans' value='$cdsRow[0]'>
                </form>
                </td><td>" . $cdsRow[1] . "</td><td>" . $cdsRow[2] . "</td><td>" . date("h:i:s a", strtotime($cdsRow[3])) . "</td><td>" . date("M d, Y", strtotime($cdsRow[4])) . "</td><td>" .  
                "<form action='index.php' method='post'>
                    <input type='text' name='notesText' value='$cdsRow[5]'>
                    <input type='submit' name='notesButton' value='Save'>
                    <input type='hidden' name='transIdThree' value='$cdsRow[0]'>                    
                </form>" . 
                "</td>
            </tr>";
        }
    ?>
  </tbody>
</table>


<script type="text/javascript" src="signin.js"></script>

<?php
    include_once 'footer.php';
?>