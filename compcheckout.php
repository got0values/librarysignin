<?php
    include_once 'header.php';
    
    ini_set('display_errors',1);
    error_reporting(-1);

?>

<title>Computer Check Out</title>

<h2 class="text-center mb-5">Computer Check Out</h2>

<?php
if (isset($_POST["compOutSubmit"])) {
    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:signin.db');
        
        // insert transaction into db
        $ptName = $_POST['ptName'];
        $comp = $_POST['comp'];
        $periph = $_POST['periph'];
        $compOutStatement = "INSERT into CompOut (name, time, date, computer, peripheral) VALUES ('$ptName', TIME('now', 'localtime'), DATE('now', 'localtime'), '$comp', '$periph');";
        $pdo->query($compOutStatement);

    }catch (PDOException $e) {
        echo $e -> getMessage();
    }
}
?>

<div class="container input-group mb-3">
    <form action="compcheckout.php" method="post">
        <input type="text" name="ptName" placeholder="Name" id="nameInput" autofocus>
        <label for="comp">Comp:</label>
        <select name="comp">
            <option value="None">None</option>
            <option value="Laptop 1">Laptop 1</option>
            <option value="Laptop 2">Laptop 2</option>
            <option value="Laptop 3">Laptop 3</option>
            <option value="Laptop 4">Laptop 4</option>
            <option value="Laptop 5">Laptop 5</option>
            <option value="Chromebook 1">Chromebook 1</option>
            <option value="Chromebook 2">Chromebook 2</option>
            <option value="Chromebook 3">Chromebook 3</option>
            <option value="Chromebook 4">Chromebook 4</option>
            <option value="Chromebook 5">Chromebook 5</option>
        </select>
        <label for="periph">Peripheral:</label>
        <select name="periph">
            <option value="None">None</option>
            <option value="Mouse">Mouse</option>
            <option value="Headphones">Headphones</option>
        </select>
        <input name="compOutSubmit" value="Submit" type="submit">
    </form>
</div> 

<table class="table table-hover container">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Delete</th>
        <th scope="col">Name</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
        <th scope="col">Computer</th>
        <th scope="col">Peripheral</th>
        <th scope="col">Returned?</th>
    </tr>
  </thead>
  <tbody id="tBody">
    <?php
        $pdo = new PDO('sqlite:signin.db');
        // $pdo->query($cardQuery);

        // delete query and execution
        if(isset($_POST["deleteTwo"])) {
            $transidTwo = $_POST['deleteTrans'];               
            $deleteSigninQuery = "DELETE FROM CompOut WHERE transid = '$transidTwo'";
            $pdo->query($deleteSigninQuery);
        }

        // list today's patron checkouts
        $getCurDateCompStats = "SELECT * FROM CompOut WHERE date = DATE('now', 'localtime');";
        $curDateCompStats = $pdo->query($getCurDateCompStats);
        $i = 1;
        foreach ($curDateCompStats as $compsRow) {
            echo 
            "<tr>
                <td>" . $i++ . "</td>
                <td> 
                <form action='compcheckout.php' method='post'>
                    <input type='submit' name='deleteTwo' value='Delete' class='btn btn-danger btn-sm' value='Delete'>
                    <input type='hidden' name='deleteTrans' value='$compsRow[0]'>
                </form>
                </td><td>" . $compsRow[1] . "</td><td>" . date("h:i:s a", strtotime($compsRow[2])) . "</td><td>" . date("M d, Y", strtotime($compsRow[3])) . "</td><td>" . $compsRow[4] . "</td><td>" .  $compsRow[5] . "</td><td>" . 
                "<input type='checkbox'></td>
            </tr>";
        }
    ?>
  </tbody>
</table>


<script type="text/javascript" src="signin.js"></script>

<?php
    include_once 'footer.php';
?>