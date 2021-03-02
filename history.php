<?php
    include_once 'header.php';
?>

<title>History</title>

<h2 class="text-center mb-5" id='dateTitle'><?php echo $_POST['dateInput'] ?></h2> <h2 class="text-center mb-5"> History</h2>

<?php
try{
    // connect to sqlitedb
    $pdo = new PDO('sqlite:signin.db');

    // obtain date of wanted history
    $dateInput = $_POST['dateInput'];

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<div class="container input-group">
    <form action="history.php" method="post">
        <label>Date:</label>    
        <input class="mb-5" type="date" name="dateInput" id="dateInput">
        <input type="hidden" id="inputDate" name="inputDate">
        <button class="btn btn-outline-secondary" name="dateSubmit" value="Submit" type="submit" id="button-addon2">Submit</button>
    </form>
</div> 

<table class="table table-hover container">
  <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Barcode</th>
        <th scope="col">Name</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody id="tBody">
    <?php
        $pdo = new PDO('sqlite:signin.db');
        $getDateInput = "SELECT * FROM SignIn WHERE date = '$dateInput'";
        $getSelDateStats = $pdo->query($getDateInput);
        foreach ($getSelDateStats as $datesRow) {
            $transid =  $datesRow[4];
            if(isset($_POST['delete'])) {
                            $delQuery = "DELETE FROM SignIn WHERE transid = '$datesRow[4]'";
                            $pdo->query($delQuery);
                        };
            echo
            "<tr>
                <td>
                    <form action='' method='post'>
                        <input type='submit' name='delete' value='Delete' class='btn btn-danger btn-sm'>
                    </form>
                </td>
                <td>" . $datesRow[1] . "</td><td>" . $datesRow[2] . "</td><td>" . $datesRow[3] . "</td><td>" . $datesRow[4] . "</td>
            </tr>";
        }
    ?>
  </tbody>
</table>


<script type="text/javascript" src="history.js"></script>

<?php
    include_once 'footer.php';
?>