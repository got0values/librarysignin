<?php
    include_once 'header.php';
?>

<title>Computer History</title>

<h2 class="text-center mb-5" id='dateTitle'>Computer History</h2>

<?php
try{
    // connect to sqlitedb
    $pdo = new PDO('sqlite:signin.db');

    // obtain date of wanted history
    $inputDate = $_GET['inputDate'];

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<div class="d-flex justify-content-center">
    <form action="comphistory.php" method="get">
        <label>Date:</label>    
        <input class="mb-5" type="date" name="dateInput" id="dateInput" value=<?php echo $inputDate ?>>
        <input type="hidden" id="inputDate" name="inputDate">
        <button class="btn btn-outline-secondary" name="dateSubmit" value="$dateInput" type="submit" id="button-addon2">Submit</button>
    </form>
</div> 

<table class="table table-hover container">
  <thead>
    <tr>
        <th scope="col"></th>    
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
        <th scope="col">Computer</th>
        <th scope="col">Peripheral</th>
    </tr>
  </thead>
  <tbody id="tBody">
    <?php
        $pdo = new PDO('sqlite:signin.db');
        $getDateInput = "SELECT * FROM CompOut WHERE date = '$inputDate'";
        $getSelDateStats = $pdo->query($getDateInput);       
        if(isset($_GET['delete'])) {    
            $inputDate = $_GET['inputDate'];
            $transid = $_GET['datesRow'];
            $delQuery = "DELETE FROM CompOut WHERE transid = '$transid'";
            $pdo->query($delQuery);
        };
        $i = 1;
        foreach ($getSelDateStats as $datesRow) {
            echo "<tr>";
            echo    "<td>" . $i++ . "</td>";
            echo    "<td>";
            echo        "<form action='comphistory.php' method='get'>";
            echo            "<input type='hidden' name='inputDate' value='$inputDate'>";
            echo            "<input type='hidden' name='datesRow' value='$datesRow[0]'>";
            echo            "<input type='submit' id='delete' name='delete' value='Delete' class='btn btn-danger btn-sm'>";
            echo        "</form>";
            echo    "</td>";
            echo    "<td>" . $datesRow[1] . "</td><td>" . date("h:i:s a", strtotime($datesRow[2])) . "</td><td>" . date("M d, Y", strtotime($datesRow[3])) . "</td><td>" . $datesRow[4] . "</td><td>" . $datesRow[5] . "</td>";
            echo "</tr>";
        }
    ?>
  </tbody>
</table>


<script type="text/javascript" src="history.js"></script>

<?php
    include_once 'footer.php';
?>